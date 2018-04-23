    1:下载php memcache.dll，放到PHP目录下扩展
    2:配置php.ini中配置extension=php_memcache.dll
    3:写php memcache类。放带ecshop的includes目录
    4:在ecshop的includes/init.php里面声明ecshop中的$memcache对象。
    当ecshop运行的时候。到底在什么时候调用memcache内存。什么时候把ecshop从数据库中的数据放入到php memcache缓存里面呢。这个问题值得研究。
    有很多人说，在ecshop的数据库操作类里面。只要有查询，那么就将该$key=md5($sql)然后将其存储。其实不然，如果你把所有的数据库都存放到了php memcache中。那么就完蛋了。你把所有数据都放内存，内存迟早要崩溃的。而且将大量不重要的数据放内存的话，那也不好操作。而且管理起来也不方便。
    其实我们仔细考虑。如果将memcache和ecshop相互结合的话。很显然，ecshop里面的数据。只有分类和品牌信息。以及每个分类的名称，每个品牌的详细信息就足够了。还有配置文件其实也可以写到memcache中去。其他的信息，最好是不要写到memcache中。不但浪费内存，而且又不方便管理。为了轻松的管理到memcache中的数据。我们可以很有规律的让memcache中的key进行组装。
    首先ecshop分类中的memcache key值，我们可以用category_$cat_id来封装。这样的好处就是让我们能轻松的就获取到某个memcache中key下的值。也方便我们对ecshop和memcache结合之间数据的操作。