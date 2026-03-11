<?php

session_start();

$admin_id = $_POST['admin_id'];
$password = $_POST['password'];

/* STATIC ADMIN CREDENTIALS */

$valid_id = "admin";
$valid_password = "praktix123";

if($admin_id === $valid_id && $password === $valid_password){

$_SESSION['admin_logged_in'] = true;

header("Location: dashboard.php");
exit;

}else{

header("Location: login.php?error=1");
exit;

}