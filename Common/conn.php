<?php
define('FILE_PATH',       dirname(dirname(__FILE__)));                    //文件的绝对路径
include_once(FILE_PATH."/Common/config.php");                             //引入数据库配置文件
function __autoload($n){include(FILE_PATH."/Common/".$n.".class.php");}   //自动加载文件
$db =  new common(DB_HOST,DB_USER,DB_PASSWORD,DB_TABLE,CODING);           //实例化数据库类
?>