<!DOCTYPE html>
<html>
<head>
<title><?= htmlspecialchars($title ?? 'Praktix') ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/public/assets/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">
    <a class="navbar-brand fw-bold" href="/">Praktix</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="nav">
        <ul class="navbar-nav me-auto">
            <li class="nav-item"><a class="nav-link" href="/programs">Programs</a></li>
            <li class="nav-item"><a class="nav-link" href="/internships">Internships</a></li>
            <li class="nav-item"><a class="nav-link" href="/experts">Experts</a></li>
            <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
            <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
            <li class="nav-item"><a class="nav-link" href="/partner">Become a Partner</a></li>
        </ul>
        <div>
            <?php if (isset($_SESSION['user_id'])): ?>
                <span class="text-light me-3">Hi, <?= htmlspecialchars($_SESSION['user_name']) ?></span>
                <a href="/dashboard" class="btn btn-outline-light me-2">Dashboard</a>
                <a href="/logout" class="btn btn-outline-light">Logout</a>
            <?php else: ?>
                <a href="/login" class="btn btn-outline-light me-2">Login</a>
                <a href="/register" class="btn btn-primary">Register</a>
            <?php endif; ?>
        </div>
    </div>
</div>
</nav>
