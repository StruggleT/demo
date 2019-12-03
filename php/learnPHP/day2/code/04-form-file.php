<?php 

function postback() {
if (!isset($_FILES['avatar'])) {
	//如果没有文件域
	$GLOBALS['message'] = '请上传文件';
	return;
}

$avatar=$_FILES['avatar'];

if ($avatar['error']!==UPLOAD_ERR_OK) {
	//如果服务端没有收到文件
	$GLOBALS['message'] = '上传失败';
	return;
}

if ($avatar['type']!=='image/*') {
	$GLOBALS['message'] = '请上传图片格式的文件';
	return;
}
//1 服务端接收到了文件
//2 把临时目录里的文件转移到网站根目录的文件里
$temporary=$avatar['tmp_name'];
$target = './uploads/'.uniqid()	.'-'.$avatar['name'];
$moved = move_uploaded_file($temporary, $target);
if (!$moved) {
	$GLOBALS['message'] = '上传失败';
	return;
}
$GLOBALS['success'] = '上传成功';

}

if ($_SERVER['REQUEST_METHOD']==='POST') {
	//var_dump($_FILES);
postback();


// array(1) {
//   ["avatar"]=>
//   array(5) {
//     ["name"]=>
//     string(11) "bpic_02.png"
//     ["type"]=>
//     string(9) "image/png"
//     ["tmp_name"]=>
//     string(27) "C:\Windows\Temp\php30F7.tmp"
//     ["error"]=>
//     int(0)
//     ["size"]=>
//     int(402895)
//   }
// }

}


 ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文件上传</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method='post' enctype='multipart/form-data' autocomplete='off'>
	<!-- accept可以限制文件种类  值是MIMN Type-->
	<input type="file" name="avatar">
	<button>提交</button>
	<?php if (isset($message)): ?>
	<p style="color: red"><?php echo $message; ?></p>
	<?php endif ?>
	<?php if (isset($success)): ?>
	<p style="color: green"><?php echo $success ?></p>	
	<?php endif ?>
</form>
</body>
</html>