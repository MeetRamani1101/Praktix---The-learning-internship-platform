<?php

require "../config/db.php";

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM internships WHERE id=?");
$stmt->execute([$id]);

header("Location: internships.php");
