<?php 

//连接数据库
$connection = mysqli_connect('127.0.0.1','root','123456','test');
// var_dump($connection);

if (!$connection) {
	echo "连接数据库失败";
}

$query = mysqli_query($connection,'select  * from  users;');
// var_dump($query);


	if (!$query) {
		echo "查询失败";
	}
	
//根据出生日期得到实际年龄

 ?>
}




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>XXX管理系统</title>
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <nav class="navbar navbar-expand navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">XXX管理系统</a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">用户管理</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">商品管理</a>
      </li>
    </ul>
  </nav>
  <main class="container">
    <h1 class="heading">用户管理 <a class="btn btn-link btn-sm" href="add.php">添加</a></h1>
    <table class="table table-hover">
      <thead>
        <tr>
          
          <th><a class="btn btn-danger btn-sm" href="#">批量删除</a></th>
          <th>头像</th>
          <th>姓名</th>
          <th>性别</th>
          <th>年龄</th>
          <th class="text-center" width="140">操作</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($item = mysqli_fetch_assoc($query)): ?>
        <tr>
          <th scope="row"><input type="checkbox" name="checkbox" id="<?php echo $item['id'] ?>"></th>
          <td><img src="<?php echo $item['avatar']; ?>" class="rounded" alt="<?php echo $item['name']; ?>"></td>
          <td><?php echo $item['name']; ?></td>
          <td><?php echo $item['gender'] == 0 ? '♀' : '♂'; ?></td>
          <td><?php echo (int)((time()-strtotime($item['birthday']))/(86400 *365 )).'岁'; ?></td>
          <td class="text-center">
            <a class="btn btn-info btn-sm" href="edit.php?id=<?php echo $item['id'] ?>">编辑</a>
            <a class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $item['id'] ?>">删除</a>
          </td>
        </tr>
        <?php endwhile ?>
      </tbody>
    </table>
    <ul class="pagination justify-content-center">
      <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
    </ul>
  </main>
</body>
</html>
