<?php
class input{
	function post( $content ){ 
	// 判断输入是否为空
	if ( $content == ''){
		return false;//跳出程序并输出一段信息；
		}
		// 检查关键字
	$n = [
			'张三',
			'李四',
			'王五'
		];
	foreach ($n as $name) {
			if($content == $name){
				return false;
			}
		}
	return true;
}
}
?>