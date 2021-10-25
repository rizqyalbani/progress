<?php
	$this->sestart();
	var_dump($_SESSION);
	
	if (isset($_SESSION['pesan'])) {
		// echo "halo";
		$this->notif($_SESSION['pesan'], $_SESSION['detail'], $_SESSION['decision']);
		unset($_SESSION['detail']);
		unset($_SESSION['pesan']);
		unset($_SESSION['decision']);
	}
?>
<div class="container-fluid p-0 border-bottom mt-3">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-12 p-0 text-center">
				<img class="rounded" src="<?= url ?>/assets/header.png" alt="" style="width:500px" >
			</div>
			<div class="col-lg-12 mt-5 mb-3">
				<h1 class="text-center">Guest List</h1>
			</div>
		</div>
	</div>
</div>
<div class="container-md mb-5">
	<div class="row">
		<div class="col-lg-12 mt-5">
			<div class="logout mb-3 text-end">
				<?php
					if ($_SESSION['nama_user'] == 'admin') {?>
				<button class="btn btn-primary align-end" data-bs-toggle="modal" data-bs-target="#addModal" >Add Guest <i class="fas fa-users text-white"></i> </button>
				<?php } ?>
				<a href="<?= url ?>home/logout" class="btn btn-danger align-end">Logout <i class="fas fa-sign-out-alt text-white"></i> </a>
			</div>
			<table id="example" class="table table-striped table-responsive-md" style="width:100%">
				<thead>
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Instations</th>
						<th>Class</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<!-- view check in -->
					<?php 
						$count = 1;
						foreach ($data as $d) { ?>
						<td><?= $count ?></td>
						<td><?= $d['name'] ?></td>
						<td><?= $d['instantion'] ?></td>
						<td><?= $d['class'] ?></td>
						<td>
							<?php
								// var_dump($h['status']);
								
								if ($d['status'] === '2') { ?>
							<div class="checkin d-block mb-2">
								<a href="<?= url . 'home/progress_checkin/' . $d['id'] ?>" class="d-block text-decoration-none text-reset bg-success rounded p-1 ps-1 pe-1 text-center" href="">
									<p class="d-inline text-white">Check in</p>
									<i class="fas fa-check submit text-white rounded p-2 pe-0"></i>
								</a>
							</div>
							<div class="update d-inline">
								<a href="<?= url . 'home/update_guest/' . $d['id'] ?>" class="text-decoration-none text-reset bg-primary rounded p-2 ps-3 pe-3 ms-1" href="">
									<p class="d-inline text-white">Update</p>
									<i class="fas fa-edit submit text-white rounded p-2 pe-0"></i>
								</a>
							</div>
							<div class="update d-inline">
								<a href="<?= url . 'home/delete_guest/' . $d['id'] ?>" class="text-decoration-none text-reset bg-danger rounded p-2 ps-3 pe-3 ms-1" href="">
									<p class="d-inline text-white">Delete</p>
									<i class="fas fa-edit submit text-white rounded p-2 pe-0"></i>
								</a>
							</div>
							<!-- sesudah checkin -->
							<?php } else{?>
							<span style="font-size: 14px;" class="badge bg-secondary mb-3 d-block">Already check in</span>
							<div class="update mt-1 d-inline mr-2">
								<a href="<?= url . 'home/update_guest/' . $d['id'] ?>" class="text-decoration-none text-reset bg-primary rounded p-2 ps-3 pe-3" href="">
									<p class="d-inline text-white">Update</p>
									<i class="fas fa-edit submit text-white rounded p-2 pe-0"></i>
								</a>
							</div>
							<div class="update mt-1 d-inline">
								<a href="<?= url . 'home/delete_guest/' . $d['id'] ?>" class="text-decoration-none text-reset bg-danger rounded p-2 ps-3 pe-3" href="">
									<p class="d-inline text-white">Delete</p>
									<i class="fas fa-edit submit text-white rounded p-2 pe-0"></i>
								</a>
							</div>
							<?php } ?>
						</td>
					</tr>
					<?php $count++; } ?>
					</tfoot>
			</table>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Guest</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <div class="container d-flex align-items-center">
	<form method="POST" action="<?= url ?>home/insertData" class="user">
		<div class="row">
			<div class="col-lg-12 mb-3 mt-3">
				<h1 class="text-center">Input Form</h1>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<input type="text" name="name" class="form-control form-control-user"
						id="exampleInputEmail" aria-describedby="emailHelp"
						placeholder="Guest Name" required>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<input type="text" name="instantion" class="form-control form-control-user"
						id="exampleInputEmail" aria-describedby="emailHelp"
						placeholder="Enter Instantions" required>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="form-group dropdown">
					<select style="-webkit-appearance: checkbox;" class="form-control dropdown-toggle rounded-pill" data-toggle="dropdown" name="class" id="dropdownMenuLink">
						<option value="regular">Regular</option>
						<option value="vip">Vip</option>
					</select>
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>