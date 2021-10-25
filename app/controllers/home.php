<?php
    class Home extends Controller{
        public function index(){
            $this->sestart();
            if ($_SESSION['access']) {
                $data = $this->model('mainModel')->showingAlls('guestlist', 'status', 1);
                $this->view('include/header');
                $this->view('home', $data);
                $this->view('include/footer');
            }
            else{
                $this->direct('login');
            }
        }

        public function insertData(){
            $this->sestart();
            if ($_POST) {
                $data = $this->model('guestlistModel')->insertGuestList($_POST);

                if ($data >= 1) {
                    $_SESSION['pesan'] ="Success";
                    $_SESSION['detail'] = "Success Insert Data";
                    $_SESSION['decision'] = "success";
                    $this->direct('home');
                    unset($_SESSION['pesan']);
                    unset($_SESSION['detail']);
                    unset($_SESSION['decision']);
                }

                else{
                    $_SESSION['pesan'] ="Failed";
                    $_SESSION['detail'] = "Failed Insert Data";
                    $_SESSION['decision'] = "error";
                    $this->direct('home');
                    unset($_SESSION['pesan']);
                    unset($_SESSION['detail']);
                    unset($_SESSION['decision']);
                }
            }
        }

        public function delete_guest($id){
            if ($id) {
                $data = $this->model('guestlistModel')->deleteGuestList($id);
                if ($data >= 1) {
                    $_SESSION['pesan'] ="Success";
                    $_SESSION['detail'] = "Success Delete Guest List";
                    $_SESSION['decision'] = "success";
                    $this->direct('home');
                    unset($_SESSION['detail']);
                    unset($_SESSION['pesan']);
                    unset($_SESSION['decision']);
                    $_SESSION['pesan'] ="Success";
                    $_SESSION['detail'] = "Success Delete Data";
                    $_SESSION['decision'] = "success";
                    $this->direct('home');
                    unset($_SESSION['pesan']);
                    unset($_SESSION['detail']);
                    unset($_SESSION['decision']);
                }

                else{
                    $_SESSION['pesan'] ="Failed";
                    $_SESSION['detail'] = "Failed Delete Data";
                    $_SESSION['decision'] = "error";
                    $this->direct('home');
                    unset($_SESSION['pesan']);
                    unset($_SESSION['detail']);
                    unset($_SESSION['decision']); 
                }
            }
        }

        public function update_guest($id){
            var_dump($id);
            $data = $this->model('guestlistModel')->showingUpdate($id);
            if ( $data || !empty($data) ) {
                $this->view('include/header');
                $this->view('update_guest', $data);
                $this->view('include/footer');
            }
            else{
                $this->direct('home');
            }
        }

        public function progress_update(){
            $this->sestart();
            if ($_POST) {
                $data = $this->model('guestlistModel')->progressUpdate($_POST);
                var_dump($data);
                if ($data || !empty($data)) {
                    $_SESSION['pesan'] ="Success";
                    $_SESSION['detail'] = "Success Update Data";
                    $_SESSION['decision'] = "success";
                    $this->direct('home');
                    unset($_SESSION['pesan']);
                    unset($_SESSION['detail']);
                    unset($_SESSION['decision']);
                }
                else{
                    $_SESSION['pesan'] ="Failed";
                    $_SESSION['detail'] = "Failed Update Data";
                    $_SESSION['decision'] = "error";
                    $this->direct('home');
                    unset($_SESSION['pesan']);
                    unset($_SESSION['detail']);
                    unset($_SESSION['decision']); 
                }
            }
        }

        public function progress_uncheck($id){
            $data = $this->model('guestlistModel')->progressUncheck($id);
            $this->sestart();
            if ($data || !empty($data)) {
                $_SESSION['pesan'] ="Success";
                $_SESSION['detail'] = "Success Uncheck";
                $_SESSION['decision'] = "success";
                $this->direct('home');
            }
            else{
                $_SESSION['pesan'] ="Failed";
                $_SESSION['detail'] = "Failed Uncheck Data";
                $_SESSION['decision'] = "error";
                $this->direct('home');
                unset($_SESSION['pesan']);
                unset($_SESSION['decision']);
                unset($_SESSION['detail']);
            }
        }

        public function progress_checkin($id){
            $this->sestart();
            $data = $this->model('guestlistModel')->progressCheckin($id);
            if ($data || !empty($data)) {
                $_SESSION['pesan'] ="Success";
                $_SESSION['detail'] = "Success Check in";
                $_SESSION['decision'] = "success";
                $this->direct('home');
                
            }
            else{
                $_SESSION['pesan'] ="Failed";
                $_SESSION['detail'] = "Failed Check in";
                $_SESSION['decision'] = "error";
                $this->direct('home');
                unset($_SESSION['detail']);
                unset($_SESSION['decision']);
                unset($_SESSION['pesan']);
            }
        }

        public function logout(){
            $this->sestart();
            session_destroy();
            unset($_SESSION);
            $_SESSION = null;
            $this->direct('home');
        }

    }
?>