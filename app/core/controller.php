<?php
    class Controller{

        public function view($view, $data = ""){
            // var_dump($data);
            if ($data == "") {
                unset($data);
            }
            // var_dump($data);
            require_once "../app/views/$view.php";
        }

        //panggil controller
        public function model($model){
            require_once "../app/models/$model.php";
            return new $model;
        }

        public function mypath(){
            return url;
        }
        
        public function sestart(){
            if (!isset($_SESSION)) {
                session_start();
            }
        }

        public function keepses(){
            if ($_SESSION) {
                $_SESSION['username1'] = $_SESSION['username'];
                $_SESSION['password1'] = $_SESSION['password'];
            }
            // else{
            //     $this->logcheck();
            // }
        }

        public function direct($to){
            $direct = $this->mypath() . "$to";
            header("Location:" . $direct);
        }

        public function linkin($to){
            return $this->mypath() . "$to";
        }

        public function logcheck(){
            $this->sestart();
            // var_dump($data);
            if ( empty($_SESSION['username']) && empty($_SESSION['password']) ){
                header("Location:" . $this->mypath()."/login" );
            }
        }
        public function asset($asset){
            return $this->mypath() . "/asset/$asset";
        }

        public function wordLimit($string, $limit){
            $word = explode(" ", $string);
            // var_dump($word);
            $delimited =  implode(" ", array_splice($word, 0, $limit));
            
            if ($delimited > $limit) {
                return $delimited . "....";
            }
            else{
                return $delimited;
            }
        }

        public function notif($pesan, $detail, $decision){
            echo "<script type='text/JavaScript'>
                Swal.fire(
                    '$pesan',
                    '$detail',
                    '$decision'
                )
            </script>";
        }

    }
?>