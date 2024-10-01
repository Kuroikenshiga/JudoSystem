<?php

    class GolpesSoloModel extends Model{
        
        public function insert($obj){}
        public function update($obj){}
        public function delete($id){}

        public function selectAll(){
            $stmt = $this->getConnection()->prepare("select * from golpes_de_solo");
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