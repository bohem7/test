<?php
header("Content-type:text/html;charset=utf-8");  
include('input.php');
include('connect.php');
$content = $_POST['content'];
$user1 = $_POST['user'];


$input = new input();
// var_dump($input);

// 定义函数，对留言数据进行检查，通常不会在函数中直接输出一段信息

// 调用函数，检查留言内容
$is = $input->post( $content );
if ($is == false){
	die('留言内容格式不正确');
}
// 调用函数，检查留言人
$is = $input->post( $user1 );
if ($is == false){
	die('留言人违法');
}
//var_dump($content,$user);

$sql = "insert into msg (neirong,user,intime) values ('{$content}', '{$user1}','{$time}')";
// echo $sql;
$is = $db->query($sql);
// var_dump( $is );
header("location:gbook.php");
?>