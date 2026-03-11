<?php

session_start();
require "../config/db.php";

$stmt = $pdo->query("SELECT * FROM learners ORDER BY id DESC");
$users = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html>
<head>

<title>Users</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Users</h2>

<table class="table table-bordered">

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
</tr>

<?php foreach($users as $u): ?>

<tr>

<td><?= $u['id'] ?></td>
<td><?= $u['name'] ?></td>
<td><?= $u['email'] ?></td>

</tr>

<?php endforeach; ?>

</table>

</div>

</body>
</html>