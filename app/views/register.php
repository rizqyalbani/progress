<div class="background-login">
    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-lg-7">
                <div class="row holder-login justify-content-center align-items-center ">
                    <div class="col-lg-12 p-2">
                        <!-- judul -->
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <h1 class="text-center mt-4 mb-4" >Register</h1>
                            </div>
                        </div>
                        <!-- pillbar -->
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="row m-0">
                                    <div class="col-lg-4 text-center p-0">
                                        <a class="text-decoration-none" href="<?= $this->mypath() ?>/login"><p class="text-dark p-1" >Sign In</p></a>
                                    </div>
                                    <div class="col-lg-4 text-center p-0">
                                        <a class="text-decoration-none" href=""><p class="text-white rounded-pill bg-primary p-1">Sign Up</p></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- input -->
                        <form action="<?=$this->mypath()?>/register/process" method="POST">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <div class="form-group mb-2">
                                        <input type="number" class="form-control my-input" name="nik" placeholder="Nik" >
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group mb-2">
                                        <input type="text" class="form-control my-input" name="nama" placeholder="Nama">
                                    </div>
                                </div>
                                <div class="col-lg-7 mb-0">
                                    <div class="form-group mb-2">
                                        <input type="text" class="form-control my-input" name="username" placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-lg-7 mb-0">
                                    <div class="form-group mb-2">
                                        <input type="password" class="form-control my-input" name="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-lg-7 mb-0">
                                    <div class="form-group mb-2">
                                        <input type="number" class="form-control my-input" name="telp" placeholder="telp">
                                    </div>
                                </div>
                                <div class="col-lg-7 mb-0 text-center">
                                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                                </div>
                                <div class="col-lg-7 mb-3 mt-1">
                                    <p class="text-danger">
                                        <?php if (isset($data['error'])) {
                                            echo $data['error'];
                                        } ?>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>