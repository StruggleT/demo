<?php 
  // phpinfo();
  //建立连接
  $connection = mysqli_connect('127.0.0.1','root','123456','demo2');
  // var_dump($connection);

  mysqli_set_charset($connection,'utf8');
  if (!$connection) {
  	echo "<h1>连接数据库失败</h1>";
  }
  //得到一个查询对象，这个查询对象可以再到数据库里一个一个的取数据
  $query = mysqli_query($connection,'delete from users where id = 4;');

  if (!$query) {
    echo "<h1>查询失败</h1>";
  }

 //拿到受影响的行
  $row = mysqli_affected_rows($connection);
  var_dump($row);


  //关闭连接
  mysqli_close($connection);

 ?>