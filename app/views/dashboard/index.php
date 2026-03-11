<div class="container mt-5">
    <h2>My Dashboard</h2>
    <p class="text-muted">Welcome back, <?= htmlspecialchars($_SESSION['user_name']) ?>!</p>

    <?php if ($msg == '1'): ?>
        <div class="alert alert-success">✅ Successfully enrolled / applied!</div>
    <?php elseif ($msg == 'already'): ?>
        <div class="alert alert-warning">⚠️ You have already applied or enrolled.</div>
    <?php endif; ?>

    <!-- ENROLLED PROGRAMS -->
    <h4 class="mt-5">📚 My Enrolled Programs</h4>
    <?php if (!$enrollments): ?>
        <div class="alert alert-info mt-3">
            No enrolled programs yet. <a href="/programs" class="alert-link">Browse Programs</a>
        </div>
    <?php else: ?>
        <table class="table table-bordered mt-3">
            <thead class="table-dark">
                <tr><th>#</th><th>Program</th><th>Duration</th><th>Hours</th><th>Price</th><th>Enrolled On</th><th>Action</th></tr>
            </thead>
            <tbody>
                <?php foreach ($enrollments as $i => $e): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= htmlspecialchars($e['title']) ?></td>
                    <td><?= $e['duration_weeks'] ?> weeks</td>
                    <td><?= $e['total_hours'] ?> hrs</td>
                    <td><?= $e['price'] ?> <?= $e['currency'] ?></td>
                    <td><?= date('d M Y', strtotime($e['enrolled_at'])) ?></td>
                    <td><a href="/program?slug=<?= urlencode($e['slug']) ?>" class="btn btn-sm btn-primary">View</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <!-- INTERNSHIP APPLICATIONS -->
    <h4 class="mt-5">💼 My Internship Applications</h4>
    <?php if (!$applications): ?>
        <div class="alert alert-info mt-3">
            No applications yet. <a href="/internships" class="alert-link">Browse Internships</a>
        </div>
    <?php else: ?>
        <table class="table table-bordered mt-3">
            <thead class="table-dark">
                <tr><th>#</th><th>Internship</th><th>Duration</th><th>Location</th><th>Message</th><th>Applied On</th><th>Status</th><th>Action</th></tr>
            </thead>
            <tbody>
                <?php foreach ($applications as $i => $app): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= htmlspecialchars($app['title']) ?></td>
                    <td><?= $app['duration_weeks'] ?> weeks</td>
                    <td><?= htmlspecialchars($app['location_type']) ?></td>
                    <td><?= htmlspecialchars(substr($app['message'], 0, 60)) ?>...</td>
                    <td><?= date('d M Y', strtotime($app['created_at'])) ?></td>
                    <td><span class="badge bg-warning text-dark"><?= ucfirst($app['status'] ?? 'Pending') ?></span></td>
                    <td><a href="/internship?slug=<?= urlencode($app['slug']) ?>" class="btn btn-sm btn-primary">View</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
