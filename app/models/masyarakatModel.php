<?php
    class masyarakatModel extends Controller{
        private $table = "masyarakat", $db, $mm;

        public function __construct()
        {
            $this->db = new Db();
            $this->mm = $this->model("mainModel");
        }

        public function login(){
            if (isset($_POST)) {
                // $nik = "test";
                // $nik = $_POST['nik'];
                $sql = "SELECT * FROM $this->table WHERE NIK= :nik";
                $this->db->query($sql);
                $this->db->bind("nik", $_POST['nik']);
                $this->db->execute();
                return $this->db->single();
            }
        }

        public function updateProfile(){
            $this->sestart();
            // var_dump($_POST);
            $nik = $this->mm->showing("$this->table", "nik", $_SESSION['nik']);
            var_dump($_SESSION['nik']);
            $sql = "UPDATE $this->table SET nik = :nikBaru, nama = :nama, username = :username, password = :password, telp = :telp WHERE nik = :nik";
            $this->db->query($sql);
            $this->db->bind("nikBaru", $_POST['nik']);
            $this->db->bind("nik", $nik['nik']);
            $this->db->bind("nama", $_POST['nama']);
            $this->db->bind("username", $_POST['username']);
            $this->db->bind("password", $_POST['password']);
            $this->db->bind("telp", $_POST['telp']);
            
            $this->db->execute();
            return $this->db->rowCount();
        }

    }
?>
