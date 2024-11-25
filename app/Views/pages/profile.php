<?php $this->extend('layout/layout'); ?>

<?php $this->section('content'); ?>
<!-- =======================
Main Content START -->
<section class="pt-3">
	<div class="container">
		<div class="row">
<?php
 //var_dump(session()->get('user_data'));?>
			<!-- Sidebar START -->
			<div class="col-lg-4 col-xl-3">
				<!-- Responsive offcanvas body START -->
				<div class="offcanvas-lg offcanvas-end" tabindex="-1" id="offcanvasSidebar" >
					<!-- Offcanvas header -->
					<div class="offcanvas-header justify-content-end pb-2">
						<button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasSidebar" aria-label="Close"></button>
					</div>

					<!-- Offcanvas body -->
					<div class="offcanvas-body p-3 p-lg-0">
						<div class="card bg-light w-100">

			
							<!-- Card body START -->
							<div class="card-body p-3">
								<!-- Avatar and content -->
								<div class="text-center mb-3">
									<!-- Avatar -->
									<div class="avatar avatar-xl mb-2">
										<img class="avatar-img rounded-circle border border-2 border-white"  src="<?= session()->get('user_data')['picture'] ?? base_url('public/assets/images/avatar/04.jpg'); ?>" alt="">
									</div>
									<h6 class="mb-0"><?= session()->get('user_data')['name'] ?? 'User Name'; ?></h6>
									<a href="#" class="text-reset text-primary-hover small"><?= session()->get('user_data')['email'] ?? 'user@example.com'; ?></a>
									<hr>
								</div>

								<!-- Sidebar menu item START -->
								<ul class="nav nav-pills-primary-soft flex-column">
									<li class="nav-item">
										<a class="nav-link active" href="<?= base_url("/profile") ?>"><i class="bi bi-person fa-fw me-2"></i>My Profile</a>
									</li>
								
									<li class="nav-item">
										<a class="nav-link text-danger bg-danger-soft-hover" href="<?= base_url("/logout") ?>"><i class="fas fa-sign-out-alt fa-fw me-2"></i>Sign Out</a>
									</li>
								</ul>
								<!-- Sidebar menu item END -->
							</div>
							<!-- Card body END -->
						</div>
					</div>
				</div>	
				<!-- Responsive offcanvas body END -->	
			</div>
			<!-- Sidebar END -->

			<!-- Main content START -->
			<div class="col-lg-8 col-xl-9">

				<!-- Offcanvas menu button -->
				<div class="d-grid mb-0 d-lg-none w-100">
					<button class="btn btn-primary mb-4" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
						<i class="fas fa-sliders-h"></i> Menu
					</button>
				</div>

				<div class="vstack gap-4">
			
						<!-- Content -->
						<div class="bg-body rounded p-3 mt-3">
							<ul class="list-inline hstack flex-wrap gap-2 justify-content-between mb-0">
								  <!-- Email verification status -->
									<!-- <?php //if (session()->get('user_data')['verified_email']): ?>
										<li class="list-inline-item h6 fw-normal mb-0">
											<a href="#">
												<i class="bi bi-check-circle-fill text-success me-2"></i> Verified Email
											</a>
										</li>
									<?php //else: ?> -->
										<!-- Optionally, you can add an "Unverified Email" item if needed -->
										<!-- <li class="list-inline-item h6 fw-normal mb-0">
											<a href="#">
												<i class="bi bi-x-circle-fill text-danger me-2"></i> Unverified Email
											</a>
										</li>
									<?php //endif; ?> -->
								<li class="list-inline-item h6 fw-normal mb-0"><a href="#"><i class="bi bi-check-circle-fill text-success me-2"></i>PASSENGER</a></li>
							</ul>
						</div>
					</div>

					<!-- Personal info START -->
					<div class="card border">
						<!-- Card header -->
						<div class="card-header border-bottom">
							<h4 class="card-header-title">Personal Information</h4>
						</div>

						<!-- Card body START -->
						<div class="card-body">
							<!-- Form START -->
							<form class="row g-3">
								<!-- Name -->
								<div class="col-md-6">
									<label class="form-label">Full Name<span class="text-danger">*</span></label>
									<input type="text" class="form-control" 
										value="<?= session()->get('user_data')['name'] ?? ''; ?>" 
										placeholder="Enter your full name">
								</div>

								<!-- Email -->
								<div class="col-md-6">
									<label class="form-label">Email address<span class="text-danger">*</span></label>
									<input type="email" class="form-control" 
										value="<?= session()->get('user_data')['email'] ?? ''; ?>" 
										placeholder="Enter your email id">
								</div>

								<!-- Mobile -->
								<div class="col-md-6">
									<label class="form-label">Mobile number<span class="text-danger">*</span></label>
									<input type="text" class="form-control" 
										value="<?= session()->get('user_data')['mobile'] ?? ''; ?>" 
										placeholder="Enter your mobile number">
								</div>

								<!-- Nationality -->
								<div class="col-md-6">
									<label class="form-label">Nationality<span class="text-danger">*</span></label>
									<select class="form-select js-choice">
										<option value="">Select your country</option>
										<?php 
										// Example options, adjust as necessary
										$nationalities = ['USA', 'Paris', 'India', 'UK']; 
										$user_nationality = session()->get('user_data')['nationality'] ?? '';
										foreach ($nationalities as $country): 
										?>
											<option value="<?= $country; ?>" 
													<?= ($country == $user_nationality) ? 'selected' : ''; ?>>
												<?= $country; ?>
											</option>
										<?php endforeach; ?>
									</select>
								</div>

								<!-- Date of birth -->
								<div class="col-md-6">
									<label class="form-label">Date of Birth<span class="text-danger">*</span></label>
									<input type="text" class="form-control flatpickr" 
										value="<?= session()->get('user_data')['dob'] ?? ''; ?>" 
										placeholder="Enter date of birth" 
										data-date-format="d M Y">
								</div>

								<!-- Gender -->
								<div class="col-md-6">
									<label class="form-label">Select Gender<span class="text-danger">*</span></label>
									<div class="d-flex gap-4">
										<?php 
										$gender = session()->get('user_data')['gender'] ?? ''; 
										$genders = ['Male', 'Female', 'Others'];
										foreach ($genders as $g): 
										?>
											<div class="form-check radio-bg-light">
												<input class="form-check-input" type="radio" 
													name="gender" id="gender<?= $g; ?>" 
													value="<?= $g; ?>" 
													<?= ($g == $gender) ? 'checked' : ''; ?>>
												<label class="form-check-label" for="gender<?= $g; ?>">
													<?= $g; ?>
												</label>
											</div>
										<?php endforeach; ?>
									</div>
								</div>

								<!-- Address -->
								<div class="col-12">
									<label class="form-label">Address</label>
									<textarea class="form-control" rows="3" spellcheck="false">
										<?= session()->get('user_data')['address'] ?? ''; ?>
									</textarea>
								</div>

								<!-- Button -->
								<div class="col-12 text-end">
									<a href="#" class="btn btn-primary mb-0">Save Changes</a>
								</div>
							</form>
							<!-- Form END -->
						</div>
						<!-- Card body END -->
					</div>
					<!-- Personal info END -->

					<!-- Personal info END -->

				
				</div>
			</div>
			<!-- Main content END -->

		</div>
	</div>
</section>
<!-- =======================
Main Content END -->
<?php $this->endSection(); ?>