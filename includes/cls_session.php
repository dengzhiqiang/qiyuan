<?php

// 下面的判断语句是为了防止通过地址直接访问该页面
if (!defined('IN_ECS')) {
    die('Hacking attempt');
}

class cls_session
{
    var $db = NULL;  // 数据库连接资源句柄
    var $session_table = '';  // 会话表名：ecs_session

    var $max_life_time = 1800; // SESSION 过期时间

    var $session_name = ''; // 会话名：在客户端表示为ESCCP_ID
    var $session_id = ''; // 会话ID

    var $session_expiry = ''; // 会话过期时间戳
    var $session_md5 = '';

    // 下面的三个参数都为setcookie中的参数
    var $session_cookie_path = '/';
    var $session_cookie_domain = '';
    var $session_cookie_secure = false;

    var $memcache = null;
    var $_ip = '';  // 客户端真实IP
    var $_time = 0; // 当前时间

    function __construct(&$db, $session_table, $session_data_table, $session_name = 'ECS_ID', $session_id = '')
    {
        $this->cls_session($db, $session_table, $session_data_table, $session_name, $session_id);
    }

    function cls_session(&$db, $session_table, $session_data_table, $session_name = 'ECS_ID', $session_id = '')
    {

        $this->memcache = new Memcache();
        $this->memcache->connect("127.0.0.1", "11211");


        $GLOBALS['_SESSION'] = array(); // 定义一个全局的_SESSION数组变量


        // 下面的三个条件语句都是为了给setcookie函数的三个参数做初始化工作
        // cookie在服务器端的有效路径如果该参数设为"/",则它在整个
        // domain(域)内有效,若设为"/11",它就在domain下的/11目录及其子目录内有效,默认为当前目录
        if (!empty($GLOBALS['cookie_path'])) {
            $this->session_cookie_path = $GLOBALS['cookie_path'];
        } else {
            $this->session_cookie_path = '/';
        }

        if (!empty($GLOBALS['cookie_domain'])) {
            $this->session_cookie_domain = $GLOBALS['cookie_domain'];
        } else {
            $this->session_cookie_domain = '';
        }



        // cookie的安全传输方式，1为https，0为http或https
        if (!empty($GLOBALS['cookie_secure'])) {
            $this->session_cookie_secure = $GLOBALS['cookie_secure'];
        } else {
            $this->session_cookie_secure = false;
        }

        $this->session_name = $session_name;
        $this->session_table = $session_table;
        $this->session_data_table = $session_data_table;

        $this->db = &$db;
        $this->_ip = real_ip(); // lib_base基础函数库中的一个获取客户端真实ip的自定义函数

        if ($session_id == '' && !empty($_COOKIE[$this->session_name])) {
            // 再次载入页面的时候执行以下语句，即客户端已存在COOKIE存在
            $this->session_id = $_COOKIE[$this->session_name];
        } else {
            $this->session_id = $session_id;
        }

        // 第一次载入页面或客户端没有COOKIE时,$this->session_id为空
        if ($this->session_id) {
            // 对客户端的COOKIE进行验证，防止伪造COOKIE
            // 如果不对gen_session_key函数做一些自己的修改，黑客很容易就可以绕过这部分的验证
            $tmp_session_id = substr($this->session_id, 0, 32);
            if ($this->gen_session_key($tmp_session_id) == substr($this->session_id, 32)) {
                $this->session_id = $tmp_session_id;
            } else {
                $this->session_id = '';
            }
        }

        $this->_time = time();

        if ($this->session_id) {
            // 客户端的COOKIE已存在才会执行，否则会执行else部分，重新生成COOKIE
            $this->load_session();
        } else {
            $this->gen_session_id();

            setcookie($this->session_name, $this->session_id . $this->gen_session_key($this->session_id), 0, $this->session_cookie_path, $this->session_cookie_domain, $this->session_cookie_secure);
        }

        // PHP程序执行完成后执行该函数
        register_shutdown_function(array(&$this, 'close_session'));
    }

    /**
    * 第一次载入页面的时候这个这个函数会执行
    * 生成一个唯一的session_id并插入数据库
    */
    function gen_session_id()
    {
        $this->session_id = md5(uniqid(mt_rand(), true));

        return $this->insert_session();
    }

    function gen_session_key($session_id)
    {
        static $ip = '';

        if ($ip == '') {
            $ip = substr($this->_ip, 0, strrpos($this->_ip, '.'));
        }

        return sprintf('%08x', crc32(!empty($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] . ROOT_PATH . $ip . $session_id : ROOT_PATH . $ip . $session_id));
    }

    /**
     * 插入session到 memcache
     * @return mixed
     */
    function insert_session()
    {
        $ar = array('expiry' => $this->_time, 'ip' => $this->_ip, 'data' => 'a:0:{}', 'userid' => '0', 'adminid' => '0', 'user_name' => '', 'user_rank' => '', 'discount' => '', 'email' => '');
        return $this->memcache->set($this->session_id, $ar, false, $this->max_life_time);

    }

    function load_session()
    {

        $session = $this->memcache->get($this->session_id);
//print_r($session);

        // 执行到这一步，说明用户的客户端存在名为ECSCP_ID的COOKIE，如果$session为空，很可能这个cookie是伪造的
        if (empty($session)) {
            $this->insert_session();

            $this->session_expiry = 0;
            $this->session_md5 = '40cd750bba9870f18aada2478b24840a';
            $GLOBALS['_SESSION'] = array();
        } else {
            if (!empty($session['data']) && $this->_time - $session['expiry'] <= $this->max_life_time) {
                $this->session_expiry = $session['expiry'];
                $this->session_md5 = md5(base64_decode($session['data']));

                $GLOBALS['_SESSION'] = unserialize(base64_decode($session['data']));
                $GLOBALS['_SESSION']['user_id'] = $session['userid'];
                $GLOBALS['_SESSION']['admin_id'] = $session['adminid'];
                $GLOBALS['_SESSION']['user_name'] = $session['user_name'];
                $GLOBALS['_SESSION']['user_rank'] = $session['user_rank'];
                $GLOBALS['_SESSION']['discount'] = $session['discount'];
                $GLOBALS['_SESSION']['email'] = $session['email'];
            } else {
                $session_data = $this->db->getRow('SELECT data, expiry FROM ' . $this->session_data_table . " WHERE sesskey = '" . $this->session_id . "'");
                if (!empty($session_data['data']) && $this->_time - $session_data['expiry'] <= $this->max_life_time) {
                    $this->session_expiry = $session_data['expiry'];
                    $this->session_md5 = md5($session_data['data']);

                    $GLOBALS['_SESSION'] = unserialize(base64_decode($session['data']));
                    $GLOBALS['_SESSION']['user_id'] = $session['userid'];
                    $GLOBALS['_SESSION']['admin_id'] = $session['adminid'];
                    $GLOBALS['_SESSION']['user_name'] = $session['user_name'];
                    $GLOBALS['_SESSION']['user_rank'] = $session['user_rank'];
                    $GLOBALS['_SESSION']['discount'] = $session['discount'];
                    $GLOBALS['_SESSION']['email'] = $session['email'];
                } else {
                    $this->session_expiry = 0;
                    $this->session_md5 = '40cd750bba9870f18aada2478b24840a';
                    $GLOBALS['_SESSION'] = array();
                }
            }
        }
    }

    function update_session()
    {
        $adminid = !empty($GLOBALS['_SESSION']['admin_id']) ? intval($GLOBALS['_SESSION']['admin_id']) : 0;
        $userid = !empty($GLOBALS['_SESSION']['user_id']) ? intval($GLOBALS['_SESSION']['user_id']) : 0;
        $user_name = !empty($GLOBALS['_SESSION']['user_name']) ? trim($GLOBALS['_SESSION']['user_name']) : 0;
        $user_rank = !empty($GLOBALS['_SESSION']['user_rank']) ? intval($GLOBALS['_SESSION']['user_rank']) : 0;
        $discount = !empty($GLOBALS['_SESSION']['discount']) ? round($GLOBALS['_SESSION']['discount'], 2) : 0;
        $email = !empty($GLOBALS['_SESSION']['email']) ? trim($GLOBALS['_SESSION']['email']) : 0;
        unset($GLOBALS['_SESSION']['admin_id']);
        unset($GLOBALS['_SESSION']['user_id']);
        unset($GLOBALS['_SESSION']['user_name']);
        unset($GLOBALS['_SESSION']['user_rank']);
        unset($GLOBALS['_SESSION']['discount']);
        unset($GLOBALS['_SESSION']['email']);

        $data = base64_encode(serialize(($GLOBALS['_SESSION'])));
        $this->_time = time();

        if ($this->session_md5 == md5($data) && $this->_time < $this->session_expiry + 10) {
            return true;
        }

        $data = addslashes($data);

        if (isset($data{255})) {
        }

        $ar = array('expiry' => $this->_time, 'ip' => $this->_ip, 'data' => $data, 'userid' => $userid, 'adminid' => $adminid, 'user_name' => $user_name, 'user_rank' => $user_rank, 'discount' => number_format($discount, 2, ".", ""), 'email' => $email);

        return $this->memcache->replace($this->session_id, $ar, false, $this->max_life_time);

    }

    function close_session()
    {
        $this->update_session();


        return true;
    }

    function delete_spec_admin_session($adminid)
    {
        if (!empty($GLOBALS['_SESSION']['admin_id']) && $adminid) {

        } else {
            return false;
        }
    }

    function destroy_session()
    {
        $GLOBALS['_SESSION'] = array();

        setcookie($this->session_name, $this->session_id, 1, $this->session_cookie_path, $this->session_cookie_domain, $this->session_cookie_secure);

        /* ECSHOP 自定义执行部分 */
        if (!empty($GLOBALS['ecs'])) {
            $this->db->query('DELETE FROM ' . $GLOBALS['ecs']->table('cart') . " WHERE session_id = '$this->session_id'");
        }
        /* ECSHOP 自定义执行部分 */

        return $this->memcache->delete($this->session_id);
    }

    function get_session_id()
    {
        return $this->session_id;
    }


    function get_users_count()
    {
        // 现在统计在线活动用户仅需要这么一个简单的查询
        $all_items = $this->memcache->getExtendedStats();

        return $all_items['127.0.0.1:11211']['curr_items'];//由于有其他key的缓存，因此这只是个接近数值

    }
}

