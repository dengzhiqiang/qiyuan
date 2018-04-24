<?php
if (!defined('IN_ECS')) {
    die('Hacking attempt');
}


/*
 * memcache类
  */

class cls_memcache
{
    //声明静态成员变量
    public $m = null;

    public function __construct()
    {
        $this->m = new Memcache();
        $this->m->connect('127.0.0.1', '11211'); //写入缓存地址,port
    }


    /*
     * 加入缓存数据
     * @param string $key 获取数据唯一key
     * @param String||Array $value 缓存数据
     * @param $time memcache生存周期(秒)
     */
    public function set($key, $value, $time)
    {
        $this->m->set($key, $value, 0, $time);
    }

    /*
     * 获取缓存数据
     * @param string $key
     * @return
     */
    public function get($key)
    {
        return $this->m->get($key);
    }

    /*
     * 删除相应缓存数据
     * @param string $key
     * @return
     */
    public function del($key)
    {
        $this->m->delete($key);
    }

    /*
     * 删除全部缓存数据
     */
    public function delAll()
    {
        $this->m->flush();
    }

    /*
     * 获取缓存数据的状态
     */
    public function getStats()
    {
        return $this->m->getStats();
    }
}