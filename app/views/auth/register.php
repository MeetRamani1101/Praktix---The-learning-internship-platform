<div class="container mt-5" style="max-width:500px;">
    <h2 class="mb-4 text-center">Create Account</h2>

    <?php
    $errors = ['email_exists'=>'Email already registered.','invalid_email'=>'Please enter a valid email.','password_short'=>'Password must be at least 6 characters.'];
    if ($error && isset($errors[$error])): ?>
        <div class="alert alert-danger"><?= $errors[$error] ?></div>
    <?php endif; ?>

    <form action="/register" method="POST" onsubmit="return validateForm()">
        <div class="mb-3"><label>Name</label><input type="text" id="name" name="name" class="form-control" required minlength="3"></div>
        <div class="mb-3"><label>Email</label><input type="email" id="email" name="email" class="form-control" required></div>
        <div class="mb-3"><label>Password</label><input type="password" id="password" name="password" class="form-control" required minlength="6"></div>
        <button type="submit" class="btn btn-primary w-100">Create Account</button>
    </form>

    <hr class="my-4">
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <div id="g_id_onload"
        data-client_id="952465105483-66naukhnh2j2o96e2sv94ufm7jbts8ub.apps.googleusercontent.com"
        data-login_uri="https://ramani.byethost15.com/google-login">
    </div>
    <div class="g_id_signin w-100" data-type="standard" data-size="large" data-theme="outline"
        data-text="signup_with" data-shape="rectangular"></div>

    <p class="mt-3 text-center">Already have an account? <a href="/login">Login</a></p>
</div>

<script>
function validateForm(){
    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value;
    if(name.length < 3){ alert("Name must be at least 3 characters"); return false; }
    if(!email.includes("@")){ alert("Enter a valid email address"); return false; }
    if(password.length < 6){ alert("Password must be at least 6 characters"); return false; }
    return true;
}
</script>
