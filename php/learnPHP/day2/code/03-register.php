<?php 

function postback() {


if (empty($_POST['username'])) {
	$GLOBALS['message']='请输入用户名';
	return;
}
	
if (empty($_POST['password'])) {
		$GLOBALS['message']='请输入密码';
		return;
	}
		
if (empty($_POST['confirm'])) {
		$GLOBALS['message']='请确认密码';
		return;
	}
			
if ($_POST['password']!==$_POST['confirm']) {
		$GLOBALS['message']='两次密码输入不相同';
		return;
	}
				
if ($_POST['agree']!=='true') {
		$GLOBALS['message']='请点击同意注册';
		return;
	}
						
$username = $_POST['username'];
$password = $_POST['password'];
file_put_contents('users.txt', $username . '|' . $password . "\n", FILE_APPEND);
$GLOBALS['message'] = '注册成功';
}


if ($_SERVER['REQUEST_METHOD']==='POST') {
	postback();

} 
					


 ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete='off'>
	<table border="1">
	<tr>
		<td><label for="username">用户名</label></td>
		<td><input type="text" name="username" id="username" value="<?php echo isset($_POST['username'])?$_POST['username'] : "" ?>"></td>
	</tr>
	<tr>
		<td><label for="possword">密码</label></td>
		<td><input type="password" name="password" id="password"></td>
	</tr>
	<tr>
		<td><label for="comfirm">确认密码</label></td>
		<td><input type="password" name="confirm" id="confirm"></td>
	</tr>
	<tr>
		<td></td>
		<td><label for="agree"><input type="checkbox" name="agree" id="agree" value="true">同意注册</label></td>
	</tr>
	<?php if (isset($message)): ?>
	<tr>
		<td></td>
		<td><?php echo $message; ?></td>
	</tr>
	<?php endif ?>
	<tr>
		<td></td>
		<td><input type="submit"></td>
	</tr>
</table>
</form>
</body>
</html>