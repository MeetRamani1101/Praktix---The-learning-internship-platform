<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <img src="/public/uploads/<?= htmlspecialchars($expert['profile_photo'] ?? '') ?>" class="img-fluid rounded">
            <h4 class="mt-3"><?= htmlspecialchars($expert['name']) ?></h4>
            <p><?= htmlspecialchars($expert['expertise']) ?></p>
        </div>
        <div class="col-md-8">
            <h3>About</h3>
            <p><?= htmlspecialchars($expert['bio']) ?></p>
            <h4>Teaching Format</h4>
            <p><?= htmlspecialchars($expert['teaching_format'] ?? 'N/A') ?></p>
            <h4>Pricing</h4>
            <p><?= htmlspecialchars($expert['hourly_rate'] ?? 'N/A') ?> USD / hour</p>
            <h4>Availability</h4>
            <p><?= htmlspecialchars($expert['availability'] ?? 'N/A') ?></p>
        </div>
    </div>
</div>
