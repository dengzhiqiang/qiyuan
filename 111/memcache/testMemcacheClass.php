<?php
header("Content-type:text/html;charset=utf-8");
include __DIR__ . '/memcache.php';

$memcache = new Memcacheds();
$memcache->set('name', '邓志强', 30 * 60);


