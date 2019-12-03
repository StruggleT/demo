<?php 

function postback() {
  if (empty($_POST['title'])) {
    $GLOBALS['err_message'] = '亲，请输入标题';
    return;
  }
  if (empty($_POST['artist'])) {
    $GLOBALS['err_message'] = '亲，请输入歌手名字';
    return;
  }
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

  //判断上传图片
    if (empty($_FILES['images'])) {
    $GLOBALS['err_message'] = '请上传图片文件';
    return;
  }
  $images=$_FILES['images'];
  if ($images['error']!==UPLOAD_ERR_OK) {
    $GLOBALS['err_message'] = '上传文件失败';
    return;
  }
 // $images['type']!=='image/jpeg'&$images['type']!=='image/png'
  $file_type=array('gif','jpeg','jpg','png');
  if (in_array($_FILES['type'], $file_type)) {
    $GLOBALS['err_message'] = '请，你的图片格式不正确哦~';
    return;
  }
  if ($images['size'] > 10*1024*1024) {
    $GLOBALS['err_message'] = '图片文件过大,上传失败';
    return;
  }
    $target = '../uploads/' . uniqid() . '-' . $images['name'];
  if (!move_uploaded_file($images['tmp_name'], $target)) {
    $GLOBALS['err_message'] = '上传图片失败';
    return;
  }
  //判断是否上传音乐文件
  //判断是否有文件域
  if (empty($_FILES['source'])) {
    $GLOBALS['err_message'] = '请上传音乐文件';
    return;
  }
  $source=$_FILES['source'];
  var_dump($source['error']);
  if ($source['error']!==UPLOAD_ERR_OK) {
    $GLOBALS['err_message'] = '亲，请上传音乐文件';
    return;
  }
  if ($source['type']!=='audio/mp3') {
    $GLOBALS['err_message'] = '亲，你的音乐格式不正确哦~';
    return;
  }
  if ($source['size'] > 20*1024*1024) {
    $GLOBALS['err_message'] = '音乐文件过大,上传失败';
    return;
  }
$target = '../uploads/' . uniqid() . '-' . $source['name'];
  if (!move_uploaded_file($source['tmp_name'], $target)) {
    $GLOBALS['err_message'] = '上传音乐失败';
    return;
  }


  //全部内容上传成功
  $title = $_POST['title'];
  $artist = $_POST['artist'];
  $images = '图片';
  $source = '音乐';
//解码
  $origin = json_decode(file_get_contents('storage.json'), true);
    $origin[] = array(
    'id' => uniqid(),
    'title' => $_POST['title'],
    'artist' => $_POST['artist'],
    'images' => '123',
    'source' => '1231',
  );
//编码
  $json = json_encode($origin);

  file_put_contents('storage.json', $json);
  //header('Location: list.php');

}



if ($_SERVER['REQUEST_METHOD']==='POST') {

  postback();

 }

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>添加新音乐</title>
  <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
  <div class="container py-5">
    <h1 class="display-4">添加新音乐</h1>
    <hr>
    <?php if (isset($err_message)): ?>
    <div class="alert alert-danger" role="alert">
      <?php echo $err_message; ?>
    </div>
    <?php endif ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="form-group">
        <label for="title">标题</label>
        <input type="text" class="form-control" id="title" name="title">
      </div>
      <div class="form-group">
        <label for="artist">歌手</label>
        <input type="text" class="form-control" id="artist" name="artist">
      </div>
      <div class="form-group">
        <label for="images">海报</label>
        <input type="file" class="form-control" id="images" name="images">
      </div>
      <div class="form-group">
        <label for="source">音乐</label>
        <!-- accept 可以限制文件域能够选择的文件种类，值是 MIME Type -->
        <input type="file" class="form-control" id="source" name="source" accept="audio/*">
      </div>
      <button class="btn btn-primary btn-block">保存</button>
    </form>
  </div>
</body>
</html>
