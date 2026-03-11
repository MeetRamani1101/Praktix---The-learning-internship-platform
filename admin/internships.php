<?php

session_start();

if(!isset($_SESSION['admin_logged_in'])){
header("Location: login.php");
exit;
}

require "../config/db.php";

$stmt = $pdo->query("SELECT * FROM internships ORDER BY created_at DESC");
$internships = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html>

<head>

<title>Manage Internships</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Manage Internships</h2>

<a href="create_internship.php" class="btn btn-success mb-3">
Create Internship
</a>

<table class="table table-bordered">

<tr>

<th>Title</th>
<th>Duration</th>
<th>Status</th>
<th>Actions</th>

</tr>

<?php foreach($internships as $internship): ?>

<tr>

<td><?= htmlspecialchars($internship['title']) ?></td>

<td><?= htmlspecialchars($internship['duration_weeks']) ?> weeks</td>

<td><?= htmlspecialchars($internship['status']) ?></td>

<td>

<a href="edit_internship.php?id=<?= $internship['id'] ?>" class="btn btn-warning btn-sm">
Edit
</a>

<a href="delete_internship.php?id=<?= $internship['id'] ?>" class="btn btn-danger btn-sm">
Delete
</a>

</td>

</tr>

<?php endforeach; ?>

</table>

</div>

</body>
</html>