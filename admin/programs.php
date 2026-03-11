<?php
include "layout_header.php";

$stmt=$pdo->query("SELECT * FROM programs ORDER BY created_at DESC");
$programs=$stmt->fetchAll();
?>

<h2 class="mb-4">Manage Programs</h2>

<a href="create_program.php" class="btn btn-success mb-3">
Create Program
</a>

<div class="card">

<div class="card-body">

<table class="table table-hover">

<thead>

<tr>
<th>Title</th>
<th>Instructor</th>
<th>Price</th>
<th width="150">Actions</th>
</tr>

</thead>

<tbody>

<?php foreach($programs as $p): ?>

<tr>

<td><?= htmlspecialchars($p['title']) ?></td>

<td><?= htmlspecialchars($p['instructor_name']) ?></td>

<td><?= $p['price'] ?> <?= $p['currency'] ?></td>

<td>

<a href="edit_program.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-warning">
Edit
</a>

<a href="delete_program.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-danger">
Delete
</a>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

</div>

<?php include "layout_footer.php"; ?>