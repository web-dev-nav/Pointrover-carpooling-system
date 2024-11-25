<?php $this->extend('layout/layout'); ?>

<?php $this->section('content'); ?>
<!-- =======================
Main Content START -->
<section class="pt-4 pt-md-5">
    <div class="container h-100 d-flex px-0 px-sm-4">
        <div class="row justify-content-center align-items-center m-auto">
            <div class="col-12">
                <div class="bg-mode shadow rounded-3 overflow-hidden">
                    <div class="row g-0">
                        <!-- Vector Image -->
                        <div class="col-lg-6 d-md-flex align-items-center order-2 order-lg-1">
                            <div class="p-3 p-lg-5">
                            <img src="<?= base_url('public/assets/images/element/signin.svg');?>" class="img-fluid" alt="">
                            </div>
                            <!-- Divider -->
                            <div class="vr opacity-1 d-none d-lg-block"></div>
                        </div>
        
                        <!-- Information -->
                        <div class="col-lg-6 order-1">
                            <div class="p-4 p-sm-6">
                                <!-- Logo -->
                                <a href="index.html">
                                <img class="mb-4 h-50px" src="<?= base_url('public/assets/images/logo-black.png');?>" alt="logo">
                                </a>
                                <!-- Title -->
                                <h1 class="mb-2 h3">Create new account</h1>
                                <p class="mb-0">Already a member?<a href="<?= base_url('/login');?>">Log in</a></p>
        
                                <!-- Form START -->
                                <form action="<?= site_url('signup/email'); ?>" method="post" class="mt-4 text-start" id="registerForm">
                                    <!-- CSRF Token -->
                                    <?= csrf_field(); ?>

                                    <!-- Google and facebook button -->
                                    <div class="d-grid gap-2">
                                        <a href="<?= site_url('login/google') ?>" class="btn btn-light"><i class="fab fa-fw fa-google text-google-icon me-2"></i>Signup in with Google</a>
                                    </div>

                                    <!-- Divider -->
                                    <div class="position-relative my-4">
                                        <hr>
                                        <p class="small bg-mode position-absolute top-50 start-50 translate-middle px-2">Or sign up with</p>
                                    </div>

									 <!-- Email -->
									 <div class="mb-3">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" class="form-control" name="name" value="">
                                    </div>

                                    <!-- Email -->
                                    <div class="mb-3">
                                        <label class="form-label">Enter email id</label>
                                        <input type="email" class="form-control" name="email" value="<?= old('email') ?>">
                                    </div>
                                    <!-- Password -->
                                    <div class="mb-3 position-relative">
                                        <label class="form-label">Enter password</label>
                                        <input class="form-control fakepassword" type="password" name="password" id="psw-input">
                                        <span class="position-absolute top-50 end-0 translate-middle-y p-0 mt-3">
                                            <i class="fakepasswordicon fas fa-eye-slash cursor-pointer p-2"></i>
                                        </span>
                                    </div>
                                    <!-- Confirm Password -->
                                    <div class="mb-3">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" name="confirm_password">
                                    </div>
                                    <!-- Remember me -->
                                    <div class="mb-3">
                                        <input type="checkbox" class="form-check-input" id="rememberCheck">
                                        <label class="form-check-label" for="rememberCheck">Keep me signed in</label>
                                    </div>
                                    <!-- Button -->
                                    <div><button type="submit" class="btn btn-primary w-100 mb-0">Sign up</button></div>
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

<!-- Script to display SweetAlert -->
<script>
document.getElementById('registerForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var formData = new FormData(this);

    fetch('<?= site_url('signup/email') ?>', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'error') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: data.errors.join('<br>')
            });
        } else if (data.status === 'success') {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: data.message
            }).then(() => {
                window.location.href = '<?= site_url('/login') ?>';
            });
        }
    })
    .catch(error => {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong.'
        });
    });
});
</script>
<?php $this->endSection(); ?>
