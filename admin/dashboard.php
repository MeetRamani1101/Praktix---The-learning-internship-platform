<?php

session_start();

if(!isset($_SESSION['admin_logged_in'])){
header("Location: login.php");
exit;
}

require "../config/db.php";

$users = $pdo->query("SELECT COUNT(*) FROM learners")->fetchColumn();
$applications = $pdo->query("SELECT COUNT(*) FROM applications")->fetchColumn();
$programs = $pdo->query("SELECT COUNT(*) FROM programs")->fetchColumn();
$internships = $pdo->query("SELECT COUNT(*) FROM internships")->fetchColumn();

?>

<!DOCTYPE html>
<html>

<head>

<title>Praktix Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:#f4f6f9;
}

.sidebar{
height:100vh;
background:#111827;
color:white;
padding:20px;
}

.sidebar a{
color:white;
text-decoration:none;
display:block;
padding:10px;
border-radius:6px;
margin-bottom:5px;
}

.sidebar a:hover{
background:#374151;
}

.card{
border:none;
border-radius:12px;
box-shadow:0 5px 15px rgba(0,0,0,0.05);
}

</style>

</head>

<body>

<div class="container-fluid">

<div class="row">

<!-- SIDEBAR -->

<div class="col-md-2 sidebar">

<h4 class="mb-4">Praktix Admin</h4>

<a href="dashboard.php">Dashboard</a>
<a href="users.php">Users</a>
<a href="applications.php">Applications</a>

<a href="programs.php">Manage Programs</a>
<a href="create_program.php">Create Program</a>

<a href="internships.php">Manage Internships</a>
<a href="create_internship.php">Create Internship</a>

<a href="messages.php">Contact Messages</a>
<a href="partners.php">Partner Inquiries</a>

<hr>

<a href="logout.php">Logout</a>

</div>


<!-- MAIN CONTENT -->

<div class="col-md-10 p-4">

<h2 class="mb-4">Dashboard</h2>

<div class="row">

<div class="col-md-3">

<div class="card p-4">

<h5>Total Users</h5>
<h2><?= $users ?></h2>

</div>

</div>

<div class="col-md-3">

<div class="card p-4">

<h5>Applications</h5>
<h2><?= $applications ?></h2>

</div>

</div>

<div class="col-md-3">

<div class="card p-4">

<h5>Programs</h5>
<h2><?= $programs ?></h2>

</div>

</div>

<div class="col-md-3">

<div class="card p-4">

<h5>Internships</h5>
<h2><?= $internships ?></h2>

</div>

</div>

</div>

</div>

</div>

</div>

</body>
</html>