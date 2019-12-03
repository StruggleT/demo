<?php 

// header('Set_Cookie: foo=bar');

setcookie('key1','value1');
setcookie('key1');

setcookie('key2','value2',time() + 1 * 24 * 60 * 60);
setcookie('key3','value3',time() + 1 * 24* 60 *60);
 ?>