<?php
    class guestlistModel extends Controller{
        private $table = "guestlist", $db, $mm;

        public function __construct(){
            $this->db = new Db;
            $this->mm = $this->model('mainModel');
        }

        public function login(){
            var_dump($_POST['user']);
            $user = $this->mm->showing('user', ':nama_user', $_POST['username']);
            $pass = $this->mm->showing('user', ':password', $user['password']);

            if ($pass || !empty($pass)) {
                return $pass;
            }
        }

        public function insertGuestList(){
            $_POST['status'] = 2;
            $sql = "INSERT INTO $this->table VALUES(:id, :name, :class, :instatntion, :status)";
            // var_dump($_POST);
            $this->db->query($sql);
            $this->db->bind("id", '');
            $this->db->bind("name", $_POST['name']);
            $this->db->bind("class", $_POST['class']);
            $this->db->bind("instatntion", $_POST['instantion']);
            $this->db->bind("status", $_POST['status']);

            $this->db->execute();
            return $this->db->rowCount();
        }

        public function deleteGuestList($id){
            $sql = "DELETE FROM $this->table WHERE id = :id";
            $this->db->query($sql);
            $this->db->bind('id', $id);
            $this->db->execute();
            return $this->db->rowCount();
        }

        public function showingUpdate($id){
            $data = $this->mm->showing($this->table, ':id', $id);

            if ($data) {
                return $data;
            }
            else{
                $this->direct('home');
            }
        }

        public function progressUpdate($data){
            // var_dump($data);
            $sql = "UPDATE $this->table SET name = :name, class = :class, instantion = :instantion WHERE id = :id";
            $this->db->query($sql);
            $this->db->bind("id", $data['id']);
            $this->db->bind("name", $data['name']);
            $this->db->bind("class", $data['class']);
            $this->db->bind("instantion", $data['instantion']);
            $this->db->execute();
            return $this->db->rowCount();
        }

        public function progressUncheck($id){
            $sql = "UPDATE $this->table SET status = :status WHERE id = :id";
            $this->db->query($sql);
            $this->db->bind("status", "2");
            $this->db->bind("id", $id);
            $this->db->execute();
            return $this->db->rowCount();
        }

        public function progressCheckin($id){
            $sql = "UPDATE $this->table SET status = :status WHERE id = :id";
            $this->db->query($sql);
            $this->db->bind("status", "1");
            $this->db->bind("id", $id);
            $this->db->execute();
            return $this->db->rowCount();
        }

    }
?>