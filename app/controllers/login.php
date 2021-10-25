<?php
    class Login extends Controller{
        public function index(){
            // $login = $this->model("masyarakatModel")->login($_POST);
            // var_dump($_SESSION);
            $this->view("include/header");
            $this->view("login");
            $this->view("include/footer");
        }

        public function loginProcess(){
            $this->sestart();
            if ($_POST) {
                $login = $this->model("guestlistModel")->login($_POST);
                var_dump($login); 
                // var_dump($_POST['password']);
                // die;
                if ( $login AND $login >=1) {
                    if ($_POST['username'] == $login['nama_user'] && $_POST['password'] === $login['password'] ) {
                        $_SESSION['nama_user'] = $login['nama_user'];
                        $_SESSION['password'] = $login['password'];
                        
                        if ($login['access'] == 'admin') {
                            $_SESSION['access'] = "admin";
                        }

                        else{
                            $_SESSION['access'] = "user";
                        }
                        $_SESSION['nama_user'] = $login['nama_user'];

                        $this->logcheck();
    
                        header("Location:" . $this->mypath() . "/home");
                        
                    }
                    else{
                        $this->view("include/header");
                        // var_dump($_SESSION);
                        // echo "test";
                        $this->view("login", ['error' => 'Email atau Password Salah']);
                        $this->view("include/footer");
                    }
                } 
                else {
                    $this->view("inc/header");
                    $this->view("login", ['error' => "Data tidak dapat ditemukan"]);
                    $this->view("inc/footer");
                }
            }
            else {
                header("Location:" . $this->mypath() . "/login");
            }
            
            
        }

        public function loginAdmin(){
            $this->sestart();
            if (isset($_SESSION['username']) && isset($_SESSION['password']) ) {
                $petugas = $this->model("mainModel")->showing("petugas", "username", $_SESSION['username']);
                if ($_SESSION['username'] === $petugas['username'] && $_SESSION['password'] === $petugas['password']) {
                    $this->direct("homeAdmin");
                } 
                else {
                    $this->logoutAdmin();
                }
                
            } 
            
            else {
                // validasi data dari database
                if (isset($_POST) && !empty($_POST) ) {
                    $login = $this->model("petugasModel")->loginAdmin();
                    if ($login && $login > 1) {
                            // validasi mencocokkan dengan data di database
                            if ($_POST['username'] === $login['username'] && $_POST['password'] === $login['password']) {
    
                                // validasi level
                                if ($login['level'] === "admin") {
                                    $_SESSION['username'] = $login['username'];
                                    $_SESSION['password'] = $login['password'];
                                    $_SESSION['akses'] = "Admin";
                                    $_SESSION['telp'] = $login['telp'];
    
                                    $this->logcheck();
                                    
                                    $this->direct("homeAdmin");
                                }
                                else{
                                    $_SESSION['username'] = $login['username'];
                                    $_SESSION['password'] = $login['password'];
                                    $_SESSION['akses'] = "Petugas";
    
                                    $this->logcheck();
    
                                    $this->direct("homeAdmin");
                                }
    
                            } 
                            else {
                                $this->view("inc/header");
                                $this->view("admin/loginAdmin", ["error" => "Username atau password salah"]);
                                $this->view("inc/footer");
                                
                            }
                            
                    } 
                    else {
                            $this->view("inc/header");
                            $this->view("admin/loginAdmin", ["error" => "Data tidak dapat ditemukan"]);
                            $this->view("inc/footer");
                            // var_dump($login);
                    }
                }
                else {
                    $this->view("inc/header");
                    $this->view("admin/loginAdmin");
                    $this->view("inc/footer");
                }

                    

            }
            

        }

        public function logout(){
            $this->sestart();
            session_destroy();
            $_SESSION = "";
            header("Location:" . BASE_URL . "/home");
        }

        public function logoutAdmin(){
            $this->sestart();
            session_destroy();
            $_SESSION = "";
            header("Location:" . BASE_URL . "/login/loginAdmin");
        }

    }
?>