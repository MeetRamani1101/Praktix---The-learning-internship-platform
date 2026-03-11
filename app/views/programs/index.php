<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>Explore Programs</h2>
            <p class="text-muted">Discover industry-driven programs taught by experienced professionals.</p>
        </div>
    </div>

    <form method="GET" action="/programs" class="row g-3 mb-4">
        <div class="col-md-3">
            <input type="text" name="search" class="form-control" placeholder="Search programs..."
                value="<?= htmlspecialchars($filters['search']) ?>">
        </div>
        <div class="col-md-3">
            <select name="category" class="form-control">
                <option value="">Category</option>
                <?php foreach (['AI','Business','Software','Design'] as $cat): ?>
                <option value="<?= $cat ?>" <?= $filters['category'] == $cat ? 'selected' : '' ?>><?= $cat ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3">
            <select name="level" class="form-control">
                <option value="">Skill Level</option>
                <?php foreach (['Beginner','Intermediate','Advanced'] as $lvl): ?>
                <option value="<?= $lvl ?>" <?= $filters['level'] == $lvl ? 'selected' : '' ?>><?= $lvl ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-2">
            <select name="mode" class="form-control">
                <option value="">Delivery</option>
                <?php foreach (['Online','Hybrid','Offline'] as $m): ?>
                <option value="<?= $m ?>" <?= $filters['mode'] == $m ? 'selected' : '' ?>><?= $m ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-1">
            <button class="btn btn-primary w-100">Go</button>
        </div>
    </form>

    <div class="row">
        <?php if (!$programs): ?>
        <div class="col-12"><div class="alert alert-info">No programs found.</div></div>
        <?php endif; ?>

        <?php foreach ($programs as $program): ?>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card program-card h-100">
                <img src="/public/assets/course.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($program['title']) ?></h5>
                    <p class="text-muted small">Instructor: <?= htmlspecialchars($program['instructor_name'] ?? 'Industry Expert') ?></p>
                    <p class="card-text"><?= substr(htmlspecialchars($program['short_description']), 0, 100) ?>...</p>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="badge bg-light text-dark"><?= $program['duration_weeks'] ?> weeks</span>
                        <span class="program-price"><?= $program['price'] ?> <?= $program['currency'] ?></span>
                    </div>
                </div>
                <div class="card-footer bg-white border-0">
                    <a href="/program?slug=<?= urlencode($program['slug']) ?>" class="btn btn-primary w-100">View Program</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
