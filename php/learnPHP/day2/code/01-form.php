<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 

	var_dump($_POST);
}

 ?>


<!DOCTYPE html> 
<html lang="en">
<head>
	<meta charset="UTF‐8"> 
	<title>登录</title> 
</head>
<body>
	<!-- 表单提交给当前页面，便于维护 -->
	<form action="<?php echo  $_SERVER['PHP_SELF']; ?>" method="post"> 
		<div> 
			<label for="username">用户</label> 
			<input type="text" id="username" name="username"> 
		</div>
		<div> 
			<label for="password">密码</label> 
			<input type="password" id="password" name="password"> </div>
		<button type="submit">登录</button> 
	</form> 
</body> 
</html>