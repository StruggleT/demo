<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 

	var_dump($_POST);
}


 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>提交</title>
 </head>
 <body>
 	<form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="post">
 		性别
 		<label><input type="radio" name="sex" value="male">男</label>
 		<label><input type="radio" name="sex" value="female">女</label>
 		<br>
		<input type="checkbox" name="agree" value="true">同意注册
		<br>
		<label><input type="checkbox" name="hoddy[]" value="basketball">篮球</label>
		<label><input type="checkbox" name="hoddy[]" value="football">足球</label>
		<label><input type="checkbox" name="hoddy[]" value="pingpongball">乒乓球</label>
		<br>
		<select name="status">
			<option>已激活</option>
			<option>未激活</option>
			<option value="1">待激活</option>
		</select>
		<button>提交</button>
 	</form>
 </body>
 </html>