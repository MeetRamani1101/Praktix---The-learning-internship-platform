<style>
.hero { background: linear-gradient(135deg,#1e40af,#2563eb); padding:120px 0; }
.section-title { font-weight:700; margin-bottom:30px; }
.program-card { border:none; border-radius:12px; box-shadow:0 5px 15px rgba(0,0,0,0.08); transition:0.3s; }
.program-card:hover { transform:translateY(-5px); box-shadow:0 10px 25px rgba(0,0,0,0.12); }
.program-price { color:#2563eb; font-weight:600; }
.category-box { background:white; padding:30px; text-align:center; border-radius:12px; box-shadow:0 5px 15px rgba(0,0,0,0.06); font-weight:600; transition:0.3s; }
.category-box:hover { transform:translateY(-4px); }
.expert-card { text-align:center; background:white; padding:25px; border-radius:12px; box-shadow:0 5px 15px rgba(0,0,0,0.08); }
</style>

<!-- HERO -->
<section class="hero text-center text-white">
    <div class="container">
        <h1 class="display-4 fw-bold">Learn Industry Skills from Real Experts</h1>
        <p class="lead mt-3">Programs, internships and expert-led training designed for real industry impact.</p>
        <div class="mt-4">
            <a href="/programs" class="btn btn-light btn-lg me-3">Explore Programs</a>
            <a href="/internships" class="btn btn-outline-light btn-lg">Find Internships</a>
        </div>
    </div>
</section>

<!-- FEATURED PROGRAMS -->
<div class="container mt-5">
    <h3 class="section-title">Featured Programs</h3>
    <div class="row">
        <?php foreach ($featuredPrograms as $p): ?>
        <div class="col-md-4 mb-4">
            <div class="card program-card h-100">
                <img src="/public/assets/course.jpg" class="card-img-top">
                <div class="card-body">
                    <h5><?= htmlspecialchars($p['title']) ?></h5>
                    <p><?= htmlspecialchars(substr($p['short_description'], 0, 90)) ?>...</p>
                    <p class="program-price"><?= $p['price'] ?> <?= $p['currency'] ?></p>
                    <a href="/program?slug=<?= urlencode($p['slug']) ?>" class="btn btn-primary btn-sm">View Program</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- INTERNSHIPS -->
<div class="container mt-5">
    <h3 class="section-title">Internship Opportunities</h3>
    <div class="row">
        <?php foreach ($featuredInternships as $i): ?>
        <div class="col-md-4 mb-4">
            <div class="card program-card h-100">
                <div class="card-body">
                    <h5><?= htmlspecialchars($i['title']) ?></h5>
                    <p><?= htmlspecialchars(substr($i['full_description'], 0, 100)) ?>...</p>
                    <p>Duration: <?= $i['duration_weeks'] ?> weeks</p>
                    <a href="/internship?slug=<?= urlencode($i['slug']) ?>" class="btn btn-outline-dark btn-sm">View Internship</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- CATEGORIES -->
<div class="container mt-5">
    <h3 class="section-title">Popular Categories</h3>
    <div class="row text-center">
        <div class="col-md-3 mb-3"><div class="category-box">AI & Data Science</div></div>
        <div class="col-md-3 mb-3"><div class="category-box">Business Strategy</div></div>
        <div class="col-md-3 mb-3"><div class="category-box">Software Engineering</div></div>
        <div class="col-md-3 mb-3"><div class="category-box">Design & UX</div></div>
    </div>
</div>

<!-- EXPERTS -->
<div class="container mt-5">
    <h3 class="section-title">Featured Experts</h3>
    <div class="row">
        <?php foreach ($featuredExperts as $e): ?>
        <div class="col-md-4 mb-4">
            <div class="expert-card">
                <img src="/public/assets/expert.jpg" class="rounded-circle mb-3" width="80">
                <h5><?= htmlspecialchars($e['name']) ?></h5>
                <p><?= htmlspecialchars(substr($e['bio'], 0, 100)) ?></p>
                <p><b><?= htmlspecialchars($e['expertise']) ?></b></p>
                <a href="/expert?id=<?= $e['id'] ?>" class="btn btn-primary btn-sm">View Profile</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- TRUST -->
<section class="bg-light py-5 mt-5">
    <div class="container text-center">
        <h3 class="section-title">Trusted by Industry Professionals</h3>
        <p class="text-muted mb-4">Praktix collaborates with experts, universities, and innovative companies.</p>
        <div class="row justify-content-center">
            <?php foreach (['logo1.png','logo2.png','logo3.png','logo4.jpg','logo5.png'] as $logo): ?>
            <div class="col-md-2 col-4 mb-3"><img src="/public/assets/<?= $logo ?>" class="img-fluid"></div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- TESTIMONIALS -->
<section class="container mt-5">
    <h3 class="section-title text-center">Learner Success Stories</h3>
    <div class="row mt-4">
        <div class="col-md-4 mb-4"><div class="card p-4 shadow-sm"><p>"Praktix helped me transition into data analytics through a practical bootcamp."</p><hr><b>Rahul Sharma</b><div class="text-muted small">Data Analyst</div></div></div>
        <div class="col-md-4 mb-4"><div class="card p-4 shadow-sm"><p>"The mentorship gave me real-world product management skills I could immediately apply."</p><hr><b>Anna Weber</b><div class="text-muted small">Product Manager</div></div></div>
        <div class="col-md-4 mb-4"><div class="card p-4 shadow-sm"><p>"The internship connected me with an amazing startup where I gained hands-on experience."</p><hr><b>Maria Gomez</b><div class="text-muted small">UX Designer</div></div></div>
    </div>
</section>

<!-- BECOME EXPERT -->
<section class="bg-light py-5 mt-5 text-center">
    <div class="container">
        <h3>Share Your Knowledge</h3>
        <p class="mt-3">Join Praktix as an expert and create programs, mentor learners, and collaborate with companies.</p>
        <a href="/expert-register" class="btn btn-primary">Become an Expert</a>
    </div>
</section>
