<?php

session_start();
require "../config/db.php";

if(!isset($_SESSION['user_id'])){
header("Location: ../login.php");
exit;
}

$title = $_POST['title'];
$slug = $_POST['slug'];
$instructor = $_POST['instructor_name'];
$duration = $_POST['duration_weeks'];
$hours = $_POST['total_hours'];
$price = $_POST['price'];
$currency = $_POST['currency'];
$description = $_POST['full_description'];

$stmt = $pdo->prepare("
INSERT INTO programs
(title,slug,instructor_name,duration_weeks,total_hours,price,currency,full_description)
VALUES (?,?,?,?,?,?,?,?)
");

$stmt->execute([
$title,
$slug,
$instructor,
$duration,
$hours,
$price,
$currency,
$description
]);

header("Location: ../admin/dashboard.php");
exit;