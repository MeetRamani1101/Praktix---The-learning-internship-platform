<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>

<title>Admin Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5" style="max-width:400px;">

<h3 class="mb-4 text-center">Admin Login</h3>

<?php if(isset($_GET['error'])): ?>

<div class="alert alert-danger">
Invalid credentials
</div>

<?php endif; ?>

<form action="login_submit.php" method="POST">

<div class="mb-3">
<label>Admin ID</label>
<input type="text" name="admin_id" class="form-control" required>
</div>

<div class="mb-3">
<label>Password</label>
<input type="password" name="password" class="form-control" required>
</div>

<button class="btn btn-dark w-100">
Login
</button>

</form>

</div>

</body>
</html>