<?php

require "../config/db.php";

$stmt = $pdo->query("SELECT * FROM partner_inquiries ORDER BY created_at DESC");

$rows = $stmt->fetchAll();

?>

<h2>Partner Inquiries</h2>

<table class="table">

<tr>
<th>Organization</th>
<th>Name</th>
<th>Email</th>
<th>Type</th>
<th>Date</th>
</tr>

<?php foreach($rows as $r): ?>

<tr>

<td><?= $r['organization'] ?></td>
<td><?= $r['name'] ?></td>
<td><?= $r['email'] ?></td>
<td><?= $r['partnership_type'] ?></td>
<td><?= $r['created_at'] ?></td>

</tr>

<?php endforeach; ?>

</table>