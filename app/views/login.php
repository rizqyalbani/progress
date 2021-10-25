<div class="container">
	<!-- Outer Row -->
	<div class="row justify-content-center align-items-center vh-100">
		<div class="col-xl-10 col-lg-12 col-md-9">
			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg-6 d-lg-block my-login-image"></div>
						<div class="col-lg-6">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Welcome!</h1>
								</div>
								<form method="POST" action="<?= url ?>login/loginProcess" class="user">
									<div class="form-group">
										<input type="text" name="username" class="form-control form-control-user"
											id="exampleInputEmail" aria-describedby="emailHelp"
											placeholder="Enter Username" required>
									</div>
									<div class="form-group">
										<input type="password" name="password" class="form-control form-control-user"
											id="exampleInputPassword" placeholder="Enter Password"required>
									</div>
									<!-- <div class="form-group">
										<div class="custom-control custom-checkbox small">
										
										    <input type="checkbox" class="custom-control-input" id="customCheck" required>
										
										    <label class="custom-control-label" for="customCheck">Remember
										
										        Me</label>
										
										</div>
										
										</div> -->
									<button type="submit" class="btn btn-primary btn-user btn-block">
									Login
									</button>
									<hr>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>