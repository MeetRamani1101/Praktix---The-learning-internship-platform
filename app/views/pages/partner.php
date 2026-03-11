<div class="container mt-5" style="max-width:750px;">
    <h2 class="mb-3">Partner with Praktix</h2>
    <p class="text-muted">Praktix collaborates with universities, companies, and innovation ecosystems to build industry-driven learning experiences.</p>

    <div class="card shadow-sm p-4 mt-4">
        <?php if ($success): ?>
        <div class="alert alert-success">Your partnership inquiry has been submitted. Our team will contact you soon.</div>
        <?php endif; ?>

        <form action="/partner" method="POST" onsubmit="return validatePartner()">
            <div class="mb-3"><label>Organization Name</label><input type="text" id="org" name="organization" class="form-control" required></div>
            <div class="mb-3"><label>Contact Person</label><input type="text" id="pname" name="name" class="form-control" required></div>
            <div class="mb-3"><label>Email</label><input type="email" id="pemail" name="email" class="form-control" required></div>
            <div class="mb-3"><label>Phone (optional)</label><input type="text" name="phone" class="form-control"></div>
            <div class="mb-3">
                <label>Partnership Type</label>
                <select name="partnership_type" class="form-control">
                    <option value="">Select partnership type</option>
                    <option value="Internships">Internship Programs</option>
                    <option value="Corporate Training">Corporate Training</option>
                    <option value="University Collaboration">University Collaboration</option>
                    <option value="Government Programs">Government Workforce Programs</option>
                </select>
            </div>
            <div class="mb-3"><label>Message</label><textarea id="pmessage" name="message" class="form-control" rows="5" required></textarea></div>
            <button class="btn btn-success w-100">Submit Partnership Inquiry</button>
        </form>
    </div>
</div>
<script>
function validatePartner(){
    if(document.getElementById("org").value.trim().length < 3){ alert("Please enter a valid organization name."); return false; }
    if(!document.getElementById("pemail").value.includes("@")){ alert("Enter a valid email address."); return false; }
    if(document.getElementById("pmessage").value.trim().length < 10){ alert("Please provide more details in the message."); return false; }
    return true;
}
</script>
