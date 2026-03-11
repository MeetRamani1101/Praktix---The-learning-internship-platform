<?php

require "../config/db.php";

$stmt = $pdo->query("
SELECT * FROM contact_messages
ORDER BY created_at DESC
");

$messages = $stmt->fetchAll();

?>

<h2>Contact Messages</h2>

<table class="table">

<tr>
<th>Name</th>
<th>Email</th>
<th>Type</th>
<th>Subject</th>
<th>Date</th>
</tr>

<?php foreach($messages as $m): ?>

<tr>

<td><?= $m['name'] ?></td>
<td><?= $m['email'] ?></td>
<td><?= $m['type'] ?></td>
<td><?= $m['subject'] ?></td>
<td><?= $m['created_at'] ?></td>

</tr>

<?php endforeach; ?>

</table>