<div class="container mt-5">
    <h2 class="mb-4">Internship Opportunities</h2>
    <input type="text" id="searchInternships" class="form-control mb-4" placeholder="Search internships...">

    <div id="internshipResults" class="row">
        <?php foreach ($internships as $internship): ?>
        <div class="col-md-4 mb-4">
            <div class="card program-card h-100">
                <div class="card-body">
                    <h5><?= htmlspecialchars($internship['title']) ?></h5>
                    <p><?= substr(htmlspecialchars($internship['full_description']), 0, 100) ?>...</p>
                    <p><strong><?= $internship['duration_weeks'] ?> weeks</strong></p>
                    <p><?= htmlspecialchars($internship['location_type']) ?></p>
                    <a href="/internship?slug=<?= $internship['slug'] ?>" class="btn btn-primary btn-sm">View Internship</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
let timer;
document.getElementById("searchInternships").addEventListener("keyup", function(){
    clearTimeout(timer);
    let query = this.value;
    timer = setTimeout(function(){
        fetch("/search-internships?q=" + encodeURIComponent(query))
            .then(res => res.text())
            .then(data => { document.getElementById("internshipResults").innerHTML = data; });
    }, 300);
});
</script>
