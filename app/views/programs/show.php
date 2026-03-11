<div class="container mt-5">

    <?php if ($msg == 'success'): ?>
        <div class="alert alert-success">✅ You have successfully enrolled!</div>
    <?php elseif ($msg == 'already_enrolled'): ?>
        <div class="alert alert-warning">⚠️ You are already enrolled in this program.</div>
    <?php endif; ?>

    <h1><?= htmlspecialchars($program['title']) ?></h1>
    <p class="text-muted">Instructor: <?= htmlspecialchars($program['instructor_name']) ?></p>
    <hr>
    <p><?= htmlspecialchars($program['short_description']) ?></p>

    <div class="row mt-4">
        <div class="col-md-4"><h5>Duration</h5><p><?= $program['duration_weeks'] ?> weeks</p></div>
        <div class="col-md-4"><h5>Total Hours</h5><p><?= $program['total_hours'] ?> hours</p></div>
        <div class="col-md-4"><h5>Price</h5><p><?= $program['price'] ?> <?= $program['currency'] ?></p></div>
    </div>

    <?php if (isset($_SESSION['user_id'])): ?>
        <a href="/enroll?program_id=<?= $program['id'] ?>" class="btn btn-success mt-4">Enroll Now</a>
    <?php else: ?>
        <a href="/login" class="btn btn-success mt-4">Login to Enroll</a>
    <?php endif; ?>

</div>
