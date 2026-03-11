<div class="container mt-5">
    <h2>Become an Expert</h2>

    <?php if ($success): ?>
    <div class="alert alert-success">Your application has been submitted successfully!</div>
    <?php endif; ?>

    <form action="/expert-register" method="POST" enctype="multipart/form-data">
        <div class="mb-3"><label>Full Name</label><input type="text" name="name" class="form-control" required></div>
        <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" required></div>
        <div class="mb-3"><label>Phone</label><input type="text" name="phone" class="form-control"></div>
        <div class="mb-3"><label>Country</label><input type="text" name="country" class="form-control"></div>
        <div class="mb-3"><label>Expertise Areas</label><input type="text" name="expertise" class="form-control"></div>
        <div class="mb-3"><label>Years of Experience</label><input type="number" name="experience" class="form-control"></div>
        <div class="mb-3"><label>Short Bio</label><textarea name="bio" class="form-control" rows="4"></textarea></div>
        <div class="mb-3"><label>Upload CV</label><input type="file" name="cv" class="form-control"></div>
        <button type="submit" class="btn btn-primary">Register as Expert</button>
    </form>
</div>
