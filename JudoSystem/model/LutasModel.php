<?php
    require_once("./JudoSystem/model/Model.php");
    require_once("./JudoSystem/valueObject/Lutas.php");
    class LutasModel extends Model{

        public function insert($obj){
            $q = "INSERT INTO lutas(tempo, hansokuMake, ganhou, goldenScore) VALUES (?,?,?,?)";
            try{
                $stmt = $this->getConnection()->prepare($q);
                $stmt->bindValue(1,$obj->getTempo());
                $stmt->bindValue(2,$obj->getHansokuMake());
                $stmt->bindValue(3,$obj->getGanhou());
                $stmt->bindValue(4,$obj->getGoldenScore());
                $stmt->execute();
            }catch(Exception $e){
                return false;
            }
            return true;
        }
        public function update($obj){
            $q = "UPDATE lutas SET tempo = ?, hansoku_make = ?, ganhou = ?, goldenScore = ?WHERE id_lutas = ?";
            try{
                $stmt = $this->getConnection()->prepare($q);
                $stmt->bindValue(1,$obj->getTempo());
                $stmt->bindValue(2,$obj->getHansokuMake());
                $stmt->bindValue(3,$obj->getGanhou());
                $stmt->bindValue(4,$obj->getGoldenScore());
                $stmt->execute();
            }catch(Exception $e){
                return false;
            }
            return true;
        }
    }
?>