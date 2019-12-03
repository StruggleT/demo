

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 	<style>
 		

 		.ad{
 			height: 200px;
 			background-color: pink;
 		}
 		.ad a {
 			float: right;
 		}
 	</style>
 </head>
 <body>
 	<?php if (empty($_COOKIE['close_ad'])&&$_COOKIE['close_ad']!=='1'): ?>
 	<div class="ad">
 		<a href="close.php">不再显示</a>
 	</div>	
 	<?php endif ?>
 </body>
 </html>