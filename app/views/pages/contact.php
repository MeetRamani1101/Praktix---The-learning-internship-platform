<div class="container mt-5" style="max-width:700px;">
    <h2 class="mb-3">Contact Praktix</h2>
    <p class="text-muted">Have questions? Send us a message and our team will respond shortly.</p>

    <?php if ($success): ?>
    <div class="alert alert-success">Thank you! Your message has been sent successfully.</div>
    <?php endif; ?>

    <div class="card shadow-sm p-4 mt-3">
        <form action="/contact" method="POST" onsubmit="return validateContact()">
            <div class="mb-3"><label>Name</label><input type="text" id="cname" name="name" class="form-control" required></div>
            <div class="mb-3"><label>Email</label><input type="email" id="cemail" name="email" class="form-control" required></div>
            <div class="mb-3">
                <label>Inquiry Type</label>
                <select name="type" class="form-control" required>
                    <option value="">Select type</option>
                    <option value="general">General Inquiry</option>
                    <option value="learner">Learner Support</option>
                    <option value="expert">Expert Support</option>
                    <option value="partnership">Partnership</option>
                </select>
            </div>
            <div class="mb-3"><label>Subject</label><input type="text" name="subject" class="form-control" required></div>
            <div class="mb-3"><label>Message</label><textarea id="cmessage" name="message" class="form-control" rows="5" required></textarea></div>
            <button class="btn btn-primary w-100">Send Message</button>
        </form>
    </div>
</div>
<script>
function validateContact(){
    if(document.getElementById("cname").value.trim().length < 3){ alert("Name must be at least 3 characters"); return false; }
    if(!document.getElementById("cemail").value.includes("@")){ alert("Enter a valid email"); return false; }
    if(document.getElementById("cmessage").value.trim().length < 10){ alert("Message must be at least 10 characters"); return false; }
    return true;
}
</script>
