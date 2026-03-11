<div class="container mt-5">
    <h2 class="mb-4">Our Experts</h2>
    <div class="row">
        <?php foreach ($experts as $e): ?>
        <div class="col-md-4 mb-4">
            <div class="card text-center p-4 shadow-sm h-100">
                <img src="/public/assets/expert.jpg" class="rounded-circle mx-auto mb-3" width="80">
                <h5><?= htmlspecialchars($e['name']) ?></h5>
                <p class="text-muted"><?= htmlspecialchars($e['expertise']) ?></p>
                <p><?= htmlspecialchars(substr($e['bio'], 0, 100)) ?>...</p>
                <a href="/expert?id=<?= $e['id'] ?>" class="btn btn-primary btn-sm">View Profile</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
