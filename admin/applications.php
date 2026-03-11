<?php

session_start();
require "../config/db.php";

$stmt = $pdo->query("
SELECT a.*, l.name
FROM applications a
LEFT JOIN learners l ON a.user_id = l.id
ORDER BY a.id DESC
");

$applications = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html>
<head>

<title>Applications</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Applications</h2>

<table class="table table-bordered">

<tr>
<th>ID</th>
<th>User</th>
<th>Type</th>
<th>Item</th>
<th>Message</th>
</tr>

<?php foreach($applications as $a): ?>

<tr>

<td><?= $a['id'] ?></td>
<td><?= $a['name'] ?></td>
<td><?= $a['type'] ?></td>
<td><?= $a['item_id'] ?></td>
<td><?= $a['message'] ?></td>

</tr>

<?php endforeach; ?>

</table>

</div>

</body>
</html>
