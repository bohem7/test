<?php
ini_set('date.timezone','Asia/Shanghai');
$host = '127.0.0.1';
$user = 'root';
$pwd = 'root';
$dbname = 'php10';
$db = new mysqli($host,$user,$pwd,$dbname);
if($db->connect_errno <> 0){
	echo "连接失败";
	echo $db->connect_errno;
	exit;
}	

$db->query('SET NAMES UTF8');
$sql = "select * from msg order by id desc";
$mysql_result = $db->query($sql);
if( $mysql_result === false ){
	die('SQL错误');
}

while($row = $mysql_result->fetch_array( MYSQL_ASSOC )){
	$rows[] = $row;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>发送数据</title>
	<meta charset="utf-8">
	<style type="text/css">
		.wrap{
			width: 600px;
			margin: 0px auto;
		}
		.add{overflow: hidden;}
		.add .content{
			height: 100px;
			width: 598px;
			margin: 0px;
			padding: 0px;
		}
		.add .user{
			float: left;
		}
		.add span{float: left;}
		.add .submit{
			float: right;
		}
		.centerspan{text-align: center;width: 100%;}
		.msg{margin:20px 0px;background:pink;padding: 5px;}
		.msg .info{overflow: hidden;}
		.msg .user{float: left;color:blue;}
		.msg .time{float:right;color: #999;}
		.msg .content{width: 100%;}
		
	</style>
</head>
<body>
	<div class="wrap">
		<div class="add"> <!-- 发表留言 -->
			<span class="centerspan">发表留言</span>
			<form action="formsave.php" method="post">
				
				<textarea name="content" class='content' cols="50px" rows="50px">
					
				</textarea>

				<span>用户名:</span><input type="text" name="user" class="user" />
				<input type="submit" value="发表留言" class="submit" />
			</form>
		</div>

		<?php
		foreach( $rows as $row){

		?>

		<div class="msg"><!-- 查看留言 -->
			<div class="info">
				<span class="user"><?php echo $row['user'];?></span>
				<span class="time"><?php echo date( "Y-m-d H:i:s",$row['intime']);?></span>
			</div>
			<div class="content">
				<?php echo $row['neirong'];?>
			</div>
			</div>
		</div>
		<?php
	}
	?>
</body>
</html>