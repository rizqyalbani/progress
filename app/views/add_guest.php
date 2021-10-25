<?php
	require_once("./include/header.php");
	
	?>
<div class="container vh-100 d-flex align-items-center">
	<form method="POST" action="<?= url ?>padd_guest" class="user">
		<div class="row">
			<div class="col-lg-12 mb-3 mt-3">
				<h1 class="text-center">Input Form</h1>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<input type="text" name="nama_tamu" class="form-control form-control-user"
						id="exampleInputEmail" aria-describedby="emailHelp"
						placeholder="Guest Name" required>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<input type="text" name="attend" class="form-control form-control-user"
						id="exampleInputEmail" aria-describedby="emailHelp"
						placeholder="Attend" required>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<input type="number" name="jumlah_tamu" class="form-control form-control-user"
						id="exampleInputEmail" aria-describedby="emailHelp"
						placeholder="Enter Total Guest" required>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<input type="text" name="pengundang" class="form-control form-control-user"
						id="exampleInputEmail" aria-describedby="emailHelp"
						placeholder="Enter Invitee" required>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<input type="text" name="kelas" class="form-control form-control-user"
						id="exampleInputEmail" aria-describedby="emailHelp"
						placeholder="Enter Kelas" required>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="form-group">
					<button class="btn btn-primary form-control rounded-pill" >Submit</button>
				</div>
			</div>
		</div>
	</form>
</div>
<?php
	require_once("./include/footer.php");
	
	?>