<?php

require "../config/db.php";

$id=$_GET['id'];

$stmt=$pdo->prepare("DELETE FROM programs WHERE id=?");
$stmt->execute([$id]);

header("Location: programs.php");