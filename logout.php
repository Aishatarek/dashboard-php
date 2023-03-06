<?php 


session_start();
session_destroy();
if (isset($_COOKIE['id'])&&isset($_COOKIE['username'])) {
    unset($_COOKIE['id']);
    unset($_COOKIE['username']);

    setcookie('id', '', time() - 3600, '/'); // empty value and old timestamp
    setcookie('username', '', time() - 3600, '/'); // empty value and old timestamp

}
header("Location: index.php");

?>