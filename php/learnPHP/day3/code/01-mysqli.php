<?php 
  // phpinfo();

  $connection = mysqli_connect('127.0.0.1','root','123456','demo2');
  // var_dump($connection);

  if (!$connection) {
  	echo "<h1>连接数据库失败</h1>";
  }
  //得到一个查询对象，这个查询对象可以再到数据库里一个一个的取数据
  $query = mysqli_query($connection,'select * from users;');
  if (!$query) {
  	echo "<h1>查询失败</h1>";
  }

  // var_dump($query);

  // $row=mysqli_fetch_assoc($query);

  // var_dump($row);
  // while ($row) {
  // 	var_dump($row);
  // 	$row=mysqli_fetch_assoc($query);
  	
  // }

  //循环遍历结果集
  while ($row = mysqli_fetch_assoc($query)) {
  	var_dump($row);
  }

  //释放查询结果集
  mysqli_free_result($query);

  //关闭连接
  mysqli_close($connection);

 ?>