<?php

    class GolpesModel extends Model{
        
        public function insert($obj){}
        public function update($obj){}
        public function delete($id){}

        public function selectAll(){
            $stmt = $this->getConnection()->prepare("select * from golpes");
            $golpes = [];
            try{
                $stmt->execute();
                while($row = $stmt->fetch()){
                    $std = new stdClass();
                    $std->golpe = $row["golpe"];
                    $golpes[] = $std;
                }
            }catch(Exception $e){
                return false;
            }
            return $golpes;
        }
        
        public function selectById($id){}
    }
?>