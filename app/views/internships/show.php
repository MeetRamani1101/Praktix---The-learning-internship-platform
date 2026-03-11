<div class="container mt-5">
    <h1><?= htmlspecialchars($internship['title']) ?></h1>
    <hr>
    <p><?= htmlspecialchars($internship['full_description']) ?></p>

    <div class="row mt-4">
        <div class="col-md-4"><h5>Duration</h5><p><?= $internship['duration_weeks'] ?> weeks</p></div>
        <div class="col-md-4"><h5>Hours per week</h5><p><?= $internship['hours_per_week'] ?></p></div>
        <div class="col-md-4"><h5>Location</h5><p><?= $internship['location_type'] ?></p></div>
    </div>

    <div class="mt-4">
        <?php if (isset($_SESSION['user_id'])): ?>
        <form action="/apply" method="POST">
            <input type="hidden" name="type" value="internship">
            <input type="hidden" name="item_id" value="<?= $internship['id'] ?>">
            <div class="mb-3">
                <textarea name="message" class="form-control" rows="4"
                    placeholder="Why are you interested in this internship?"></textarea>
            </div>
            <button class="btn btn-success">Apply for Internship</button>
        </form>
        <?php else: ?>
        <a href="/login" class="btn btn-primary">Login to Apply</a>
        <?php endif; ?>
    </div>
</div>
