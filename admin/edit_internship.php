<?php
include "layout_header.php";

$id=$_GET['id'];

$stmt=$pdo->prepare("SELECT * FROM internships WHERE id=?");
$stmt->execute([$id]);
$internship=$stmt->fetch();

if($_SERVER['REQUEST_METHOD']=="POST"){

$title=$_POST['title'];
$desc=$_POST['description'];
$duration=$_POST['duration'];

$stmt=$pdo->prepare("
UPDATE internships
SET title=?, full_description=?, duration_weeks=?
WHERE id=?
");

$stmt->execute([$title,$desc,$duration,$id]);

header("Location: internships.php");
exit;
}
?>

<h2 class="mb-4">Edit Internship</h2>

<div class="card shadow-sm" style="max-width:600px">

<div class="card-body">

<form method="POST">

<div class="mb-3">

<label class="form-label">Internship Title</label>

<input
type="text"
name="title"
class="form-control"
value="<?= htmlspecialchars($internship['title']) ?>"
required>

</div>

<div class="mb-3">

<label class="form-label">Description</label>

<textarea
name="description"
class="form-control"
rows="4"
required><?= htmlspecialchars($internship['full_description']) ?></textarea>

</div>

<div class="mb-3">

<label class="form-label">Duration (weeks)</label>

<input
type="number"
name="duration"
class="form-control"
value="<?= $internship['duration_weeks'] ?>"
required>

</div>

<div class="d-flex gap-2">

<button class="btn btn-primary">
Update Internship
</button>

<a href="internships.php" class="btn btn-secondary">
Cancel
</a>

</div>

</form>

</div>
</div>

<?php include "layout_footer.php"; ?>