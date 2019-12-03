<?php 

if (empty($_GET['id'])) {
	exit('<h1>请传入指定参数</h1>');
}

$id = $_GET['id'];

//建立数据库连接

$connection = mysqli_connect('127.0.0.1','root','123456','test');

if (!$connection) {
	exit('<h1>连接数据库失败</h1>');
}

//开始查询

$query = mysqli_query($connection,'delete from users where id in ('.$id.')');

if (!$query) {
	exit('<h1>查询失败</h1>');
}

$affected_rows = mysqli_affected_rows($connection);
if ($affected_rows <= 0) {
	exit('<h1>删除失败</h1>');
}

header('Location: list.php');




