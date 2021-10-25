<div class="container vh-100 d-flex align-items-center">

	<form method="POST" action="<?= url ?>home/progress_update" class="user">
		<div class="row">
			<div class="col-lg-12 mb-3 mt-3">
				<h1 class="text-center">Update Form</h1>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
                    <input type="text" name="id" class="d-none" value="<?=$data['id']?>">
					<input type="text" name="name" class="form-control form-control-user"
						id="exampleInputEmail" aria-describedby="emailHelp"
						value="<?= $data['name'] ?>" required>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<input type="text" name="class" class="form-control form-control-user"
						id="exampleInputEmail" aria-describedby="emailHelp"
						value="<?= $data['class'] ?>" required>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<input type="text" name="instantion" class="form-control form-control-user"
						id="exampleInputEmail" aria-describedby="emailHelp"
						value="<?= $data['instantion'] ?>" required>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<input type="text" name="statis" class="form-control form-control-user"
						id="exampleInputEmail" aria-describedby="emailHelp"
						value="<?= $data['status'] ?>" required>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="form-group">
					<button class="btn btn-primary form-control rounded-pill" >Submit</button>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="form-group">
					<a href="<?= url ?>home/progress_uncheck/<?= $data['id'] ?>" class="btn btn-danger form-control rounded-pill" >Uncheck in</a>
				</div>
			</div>
		</div>
	</form>
</div>
<?php
	require_once("./include/footer.php");
	
	?>