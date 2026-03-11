<?php
include "layout_header.php";

$id=$_GET['id'];

$stmt=$pdo->prepare("SELECT * FROM programs WHERE id=?");
$stmt->execute([$id]);
$program=$stmt->fetch();

if($_SERVER['REQUEST_METHOD']=="POST"){

$title=$_POST['title'];
$desc=$_POST['description'];
$price=$_POST['price'];

$stmt=$pdo->prepare("
UPDATE programs
SET title=?, short_description=?, price=?
WHERE id=?
");

$stmt->execute([$title,$desc,$price,$id]);

header("Location: programs.php");
exit;
}
?>

<h2 class="mb-4">Edit Program</h2>

<div class="card shadow-sm" style="max-width:600px">

<div class="card-body">

<form method="POST">

<div class="mb-3">
<label class="form-label">Program Title</label>

<input
type="text"
name="title"
class="form-control"
value="<?= htmlspecialchars($program['title']) ?>"
required>
</div>


<div class="mb-3">

<label class="form-label">Description</label>

<textarea
name="description"
class="form-control"
rows="4"
required><?= htmlspecialchars($program['short_description']) ?></textarea>

</div>


<div class="mb-3">

<label class="form-label">Price</label>

<input
type="number"
name="price"
class="form-control"
value="<?= $program['price'] ?>"
required>

</div>


<div class="d-flex gap-2">

<button class="btn btn-primary">
Update Program
</button>

<a href="programs.php" class="btn btn-secondary">
Cancel
</a>

</div>

</form>

</div>
</div>

<?php include "layout_footer.php"; ?>