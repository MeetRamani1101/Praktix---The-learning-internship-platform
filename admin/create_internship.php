<?php

session_start();
require "../config/db.php";

if(!isset($_SESSION['user_id'])){
header("Location: ../login.php");
exit;
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Create Internship</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<h2>Create Internship</h2>

<form action="../handlers/create_internship_submit.php" method="POST">

<div class="mb-3">
<label>Internship Title</label>
<input type="text" name="title" class="form-control" required>
</div>

<div class="mb-3">
<label>Slug</label>
<input type="text" name="slug" class="form-control" placeholder="ai-research-intern">
</div>

<div class="mb-3">
<label>Domain</label>
<input type="text" name="domain" class="form-control">
</div>

<div class="mb-3">
<label>Duration (weeks)</label>
<input type="number" name="duration_weeks" class="form-control">
</div>

<div class="mb-3">
<label>Hours per week</label>
<input type="number" name="hours_per_week" class="form-control">
</div>

<div class="mb-3">
<label>Location Type</label>
<select name="location_type" class="form-control">
<option value="Remote">Remote</option>
<option value="Hybrid">Hybrid</option>
<option value="Onsite">Onsite</option>
</select>
</div>

<div class="mb-3">
<label>Required Skills</label>
<input type="text" name="required_skills" class="form-control">
</div>

<div class="mb-3">
<label>Description</label>
<textarea name="full_description" class="form-control"></textarea>
</div>

<button class="btn btn-success">
Create Internship
</button>

</form>

</div>

</body>
</html>