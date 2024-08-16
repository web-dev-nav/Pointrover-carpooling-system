<?php $this->extend('layout/layout'); ?>

<?php $this->section('content'); ?>
<!-- =======================
Main Content START -->

<section class="pt-4 pt-md-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">
                <div class="bg-mode shadow rounded-3 overflow-hidden">
                    <div class="row g-0">
                        <!-- Vector Image -->
                        <div class="col-lg-6 d-none d-lg-flex align-items-center order-2 order-lg-1">
                            <div class="p-3 p-lg-5">
                                <img src="<?= base_url('public/assets/images/element/signin.svg'); ?>" class="img-fluid" alt="">
                            </div>
                            <!-- Divider -->
                            <div class="vr opacity-1 d-none d-lg-block"></div>
                        </div>

                        <!-- Information -->
                        <div class="col-lg-6 order-1">
                            <div class="p-4 p-sm-5">
                                <!-- Logo -->
                                <a href="index.html">
                                    <img class="mb-4 h-50px" src="<?= base_url('public/assets/images/logo-black.png'); ?>" alt="logo">
                                </a>
                                <!-- Title -->
                                <h1 class="mb-2 h3">Welcome back</h1>
                                <p class="mb-0">New here?<a href="<?= base_url('/signup'); ?>"> Create an account</a></p>

                                <!-- Form START -->
                                <form action="<?= base_url('/login/email'); ?>" method="post" class="mt-4" id="login-form">
                                    <?= csrf_field(); ?>

                                    <!-- Google button -->
                                    <div class="d-grid gap-2">
                                        <a href="<?= $authUrl ?>" class="btn btn-light"><i class="fab fa-fw fa-google text-google-icon me-2"></i>Sign in with Google</a>
                                    </div>

                                    <!-- Divider -->
                                    <div class="position-relative my-4">
                                        <hr>
                                        <p class="small bg-mode position-absolute top-50 start-50 translate-middle px-2">Or sign in with</p>
                                    </div>

                                    <!-- Email -->
                                    <div class="mb-3">
                                        <label class="form-label" for="email-input">Enter email id</label>
                                        <input type="email" class="form-control" id="email-input" name="email" >
                                    </div>
                                    <!-- Password -->
                                    <div class="mb-3 position-relative">
                                        <label class="form-label" for="psw-input">Enter password</label>
                                        <input class="form-control fakepassword" type="password" id="psw-input" name="password" >
                                        <span class="position-absolute top-50 end-0 translate-middle-y p-0 mt-3">
                                            <i class="fakepasswordicon fas fa-eye-slash cursor-pointer p-2"></i>
                                        </span>
                                    </div>
                                    <!-- Remember me -->
                                    <div class="mb-3 d-sm-flex justify-content-between align-items-center">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="rememberCheck" name="remember">
                                            <label class="form-check-label" for="rememberCheck">Remember me?</label>
                                        </div>
                                        <a href="<?= base_url('/forget'); ?>" class="mt-2 mt-sm-0">Forgot password?</a>
                                    </div>
                                    <!-- Button -->
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </form>
                                <!-- Form END -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =======================
Main Content END -->

<script>
document.getElementById('login-form').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent the default form submission

    const formData = new FormData(this);

    fetch('<?= base_url('/login/email'); ?>', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'error') {
            // Display the errors using SweetAlert
            Swal.fire({
                title: 'Login Failed',
                text: data.errors.join('\n'),
                icon: 'error',
                confirmButtonText: 'OK'
            });
        } else if (data.status === 'success') {
            // Display success message and redirect
            Swal.fire({
                title: 'Login Successful',
                text: 'You will be redirected to your profile.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = '<?= base_url('/profile'); ?>'; // Change to your desired redirect page
            });
        }
    })
    .catch(error => console.error('Error:', error));
});
</script>
<?php $this->endSection(); ?>
