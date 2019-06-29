<?php
//将数据插入数据库
$host = '127.0.0.1';
$user = 'root';
$pwd = 'root';
$dbname = 'php10';

$db = new mysqli($host, $user, $pwd, $dbname);
if( $db->connect_errno <> 0){
	die ('连接失败');
}
//设定数据传输的编码，连接数据库的编码
$db->query('set names utf8');
$time  = time()
?>
