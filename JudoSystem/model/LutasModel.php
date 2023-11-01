<?php
    require_once("./JudoSystem/model/Model.php");
    require_once("./JudoSystem/valueObject/Lutas.php");
    class LutasModel extends Model{

        public function insert($obj){
            $q = "INSERT INTO lutas(tempo, hansoku_make, ganhou, goldenScore) VALUES (?,?,?,?)";
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
        public function delete($id){
            $q = "DELETE FROM lutas WHERE id_lutas=?";
            try{
                $stmt = $this->getConnection()->prepare($q);
                $stmt->bindValue(1,$id);
                $stmt->execute();
            }catch(Exception $e){
                return false;
            }
            return true;
        }
        public function selectAll(){
            $q = "SELECT * FROM lutas";
            $lutas = array();
            try{
                $stmt = $this->getConnection()->prepare($q);
                $stmt->execute();
                while($rows = $stmt->fetch()){
                    $lutas[] = new Lutas($rows["id_lutas"], $rows["tempo"], $rows["hansoku_make"], $rows["ganhou"], $rows["goldenScore"], $rows["atleta_fk"], $rows["categoria_fk"]);
                }
            }catch(Exception $e){
                return false;
            }
            return $lutas;
        }
        public function selectById($id){
            $obj = null;
            try{
                $stmt = $this->getConnection()->prepare('select * from lutas where id_lutas = ?');
                $stmt->bindValue(1,$id);
                $stmt->execute();
            }
            catch(Exception $e){
                return false;
            }
            $rows = $stmt->fetch();
                return $obj = new Lutas($rows["id_lutas"], $rows["tempo"], $rows["hansoku_make"], $rows["ganhou"], $rows["goldenScore"], $rows["atleta_fk"], $rows["categoria_fk"]);
        }
    }
?>