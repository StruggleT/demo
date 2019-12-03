<?php 
$content = file_get_contents('names.txt');

$data = array();
$lines = explode("\n", $content);

foreach ($lines as $item) {
	if (!$item) continue;
		# code...
	# code...
	$cols = explode('|', $item);
	$data[] =$cols;
}

#var_dump($data);


 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>全员信息表</title>
 </head>
 <body>
 	<h1>全员信息表</h1>
 	<table>
 		<thead>
 			<tr>
 				<th>编号</th>
 				<th>姓名</th>
 				<th>年龄</th>
 				<th>邮箱</th>
 				<th>网址</th>
 			</tr>
 		</thead>
 		<tbody>
 			<?php foreach ($data as $line): ?>
 			<tr>
 				<?php foreach ($line as $col): ?>
 				<?php $col=trim($col) ?>
 				<?php if (strpos($col,'http://')===0): ?>
 				<td><a href="<?php echo strtolower($col); ?>"><?php echo substr($col,7); ?></a></td>	
 				<?php else: ?>
 				<td><?php echo $col ?></td>	
 				<?php endif ?>
 				<?php endforeach ?>
 			</tr>	
 		<?php endforeach ?>
 		</tbody>
 	</table>
 </body>
 </html>