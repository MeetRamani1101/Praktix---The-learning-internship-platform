<div class="container mt-5" style="max-width:500px;">
    <h2 class="mb-4 text-center">Login</h2>

    <?php if ($error == 'user'): ?>
        <div class="alert alert-danger">User not found.</div>
    <?php elseif ($error == 'password'): ?>
        <div class="alert alert-danger">Incorrect password.</div>
    <?php endif; ?>

    <form action="/login" method="POST">
        <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" required></div>
        <div class="mb-3"><label>Password</label><input type="password" name="password" class="form-control" required></div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>

    <hr class="my-4">
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <div id="g_id_onload"
        data-client_id="952465105483-66naukhnh2j2o96e2sv94ufm7jbts8ub.apps.googleusercontent.com"
        data-login_uri="https://ramani.byethost15.com/google-login">
    </div>
    <div class="g_id_signin" data-type="standard" data-size="large" data-theme="outline"
        data-text="signin_with" data-shape="rectangular"></div>

    <p class="mt-3 text-center">Don't have an account? <a href="/register">Register</a></p>
</div>
