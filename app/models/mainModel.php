<?php
    class mainModel{

        private $db;

        public function __construct()
        {
            $this->db = new Db;
        }

        public function insert($table, $fills = [], $data){
            // print_r($fills);
            $jumlah = count($data);
            $sql = "INSERT INTO $table VALUES( "; 
            foreach($fills as $fill){
                $sql .= $fill;
                $sql .= ",";
            }
            $sql = rtrim($sql, ",");
            $sql.= ")";
            // print_r($sql);
            print_r(array_values($data));
            $this->db->query($sql);
            $data_num = array_values($data);

            for ($i=0; $i < $jumlah; $i++) { 
                $this->db->bind($fills[$i], $data_num[$i]);
            }
            // die;
            // echo $sql;
            $this->db->execute();
        
            return $this->db->rowCount();
        }
        
        public function showing($table, $validator, $validate){
            $validatora = ltrim($validator, ":");
            $sql = "SELECT * FROM $table WHERE $validatora = $validator";
            $this->db->query($sql);
            $this->db->bind($validator, $validate);
            $this->db->execute();
            // var_dump($this->db->single()) ;
            return $this->db->single();
        }

        public function showingAlls($table, $validator, $validate){
            $validatora = ltrim($validator, ":");
            $sql = "SELECT * FROM $table WHERE $validatora = $validator";
            $this->db->query($sql);
            $this->db->bind($validator, $validate);
            $this->db->execute();
            // var_dump($this->db->single()) ;
            return $this->db->resultSet();
        }

        public function showingAll($table){
            $sql = "SELECT * FROM $table ";
            $this->db->query($sql);
            $this->db->execute();
            return $this->db->resultSet();
        }
    }
?>