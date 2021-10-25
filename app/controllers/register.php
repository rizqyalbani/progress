<?php
    class Register extends Controller{
        public function index(){
            $this->view("inc/header");
            $this->view("register");
            $this->view("inc/footer");
        }
        public function process(){
            if ($_POST) {
                $checker = $this->model("mainModel")->showing("masyarakat", ":nik", $_POST['nik']);
                // print_r($checker); 
                // die;
                if ($checker['nik'] === $_POST['nik']) {
                    $this->view("inc/header");
                    $this->view("register", ['error' => 'NIK yang dimasukkan sudah Terdaftar']);
                    $this->view("inc/footer");
                }
                
                else{
                    $regis = $this->model("mainModel")->insert("masyarakat", [ ":nik", ":nama", ":username", ":password", ":telp" ], $_POST);
        
                    if ($regis >= 1) {
                        header("Location: " . $this->mypath());
                    }
                    else{
                        echo "gagal register";
                        var_dump($regis);
                    }
                }
            } else {
                header("Location:" . $this->mypath() . "/register");
            }
            


        }
    }
?>