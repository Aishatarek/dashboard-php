<?php
require('connection.php');
require('users/users.php');
require('admins/admins.php');
require('product/product.php');








$db=new DBController();
$Users=new Users($db);
$Admin=new Admins($db);
$product=new Product($db);



?>


