<?php
session_start();

if(!isset($_SESSION['admin_logged_in'])){
header("Location: login.php");
exit;
}

require "../config/db.php";
?>

<!DOCTYPE html>
<html>
<head>

<title>Praktix Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:#f4f6f9;
font-family:Arial;
}

.sidebar{
height:100vh;
background:#111827;
color:white;
padding:20px;
position:fixed;
width:220px;
}

.sidebar h4{
color:white;
}

.sidebar a{
color:white;
text-decoration:none;
display:block;
padding:10px;
border-radius:6px;
margin-bottom:6px;
}

.sidebar a:hover{
background:#374151;
}

.main{
margin-left:240px;
padding:30px;
}

.card{
border:none;
border-radius:12px;
box-shadow:0 5px 15px rgba(0,0,0,0.05);
}

</style>

</head>

<body>

<div class="sidebar">

<h4>Praktix Admin</h4>

<a href="dashboard.php">Dashboard</a>
<a href="programs.php">Programs</a>
<a href="internships.php">Internships</a>
<a href="users.php">Users</a>
<a href="applications.php">Applications</a>
<a href="contact.php">Messages</a>

<hr>

<a href="logout.php">Logout</a>

</div>

<div class="main">