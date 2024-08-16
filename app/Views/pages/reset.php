<?php $this->extend('layout/layout'); ?>

<?php $this->section('content'); ?>
<!-- =======================
Main Content START -->
<section class="vh-xxl-100">
	<div class="container h-100 d-flex px-0 px-sm-4">
		<div class="row justify-content-center align-items-center m-auto">
			<div class="col-12">
				<div class="bg-mode shadow rounded-3 overflow-hidden">
					<div class="row g-0">
						<!-- Vector Image -->
						<div class="col-lg-6 d-md-flex align-items-center order-2 order-lg-1">
							<div class="p-3 p-lg-5">
								<img src="<?= base_url('public/assets/images/element/forgot-pass.svg');?>" alt="">
							</div>
							<!-- Divider -->
							<div class="vr opacity-1 d-none d-lg-block"></div>
						</div>
		
						<!-- Information -->
						<div class="col-lg-6 order-1">
							<div class="p-4 p-sm-7">
								<!-- Logo -->
								<a href="index.html">
									<img class="mb-4 h-50px" src="<?= base_url('public/assets/images/logo-black.png');?>" alt="logo">
								</a>
								<!-- Title -->
								<h1 class="mb-2 h3">Change or reset password?</h1>
								<p class="mb-sm-0">Reset your password.</p>
		
								<!-- Form START -->
								<!-- forgot_password.php -->
								<form id="reset-password-form" method="post">
									<input type="hidden" name="token" value="<?= esc($token); ?>">

									<!-- Password -->
									<div class="mb-3">
										<label class="form-label" for="password-input">New Password</label>
										<input type="password" class="form-control" id="password-input" name="password" required>
									</div>

									<!-- Confirm Password -->
									<div class="mb-3">
										<label class="form-label" for="confirm-password-input">Confirm Password</label>
										<input type="password" class="form-control" id="confirm-password-input" name="confirm_password" required>
									</div>

									<!-- Button -->
									<div class="d-grid">
										<button type="submit" class="btn btn-primary">Reset Password</button>
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
        document.getElementById('reset-password-form').addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch('<?= base_url('/reset-password'); ?>', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'error') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data.errors.join('\n')
                    });
                } else if (data.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message
                    }).then(() => {
                        window.location.href = '<?= base_url('/login'); ?>';
                    });
                }
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
<?php $this->endSection(); ?>