<?php
header("Content-type:text/html;charset=utf-8");
include __DIR__ . '/memcache.php';

$memcache = new Memcacheds();

$val1 = $memcache->get('name');
var_dump($val1);

