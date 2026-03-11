<?php
require "../config/db.php";

if($_SERVER['REQUEST_METHOD']=="POST"){

$title=$_POST['title'];
$slug=strtolower(str_replace(" ","-",$title));
$desc=$_POST['description'];
$price=$_POST['price'];

$stmt=$pdo->prepare("
INSERT INTO programs(title,slug,short_description,price,status)
VALUES(?,?,?,?, 'active')
");

$stmt->execute([$title,$slug,$desc,$price]);

header("Location: programs.php");
exit;

}

?>

<h2>Create Program</h2>

<form method="POST">

<input name="title" class="form-control mb-2" placeholder="Title">

<textarea name="description" class="form-control mb-2"></textarea>

<input name="price" class="form-control mb-2" placeholder="Price">

<button class="btn btn-primary">
Create Program
</button>

</form>