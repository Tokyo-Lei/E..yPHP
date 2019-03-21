<?php


if(!defined('IS_MyPHP')) exit('拒绝访问！');

//数据库配置


$_DB['mysql']['pconnect'] = true;//设置是否长连接
$_DB['mysql']['charset'] = 'utf8';//设置连接编码
$_DB['mysql']['server'] = 'localhost';
$_DB['mysql']['username'] = '您的数据库账号';
$_DB['mysql']['password'] = '您的数据库密码';
$_DB['mysql']['database_name'] = '您的数据库名称';
$_DB['mysql']['database_type'] = 'mysql';
$_DB['mysql']['prefix'] = 'easy_';
$_DB['mysql']['port'] = 3306;