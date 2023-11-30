<?php
    require_once("./JudoSystem/model/Model.php");
    require_once("./JudoSystem/valueObject/Lutas.php");
    class LutasModel extends Model{

        public function insert($obj){
            echo json_encode($obj->toStdClass());
            $q = "INSERT INTO lutas(tempo, hansoku_make, goldenscore, categoria_fk)VALUES ( ?, ?, ?, ?) returning id_lutas";
            
                $stmt = $this->getConnection()->prepare($q);
                try{
                $stmt->bindValue(1,$obj->getTempo());
                $stmt->bindValue(2,$obj->getHansokuMake());
                $stmt->bindValue(3,$obj->getGoldenScore());
                $stmt->bindValue(4,$obj->getCategoria_fk());
                $stmt->execute();
            }catch(Exception $e){
                // echo $e->getMessage();
                return false;
            }
            return $stmt->fetch()['id_lutas'];
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
                    $lutas[] = new Lutas($rows["id_lutas"], $rows["tempo"], $rows["hansoku_make"], $rows["ganhou"], $rows["goldenscore"], $rows["atleta_fk"], $rows["categoria_fk"]);
                }
            }catch(Exception $e){
                return false;
            }
            return $lutas;
        }
        public function selectAllByCategoriaAndCompeticao($comp,$categoria){
            $q = "select*from lutas where id_lutas in (select luta_fk from lutadores where atleta_fk in (
                select id_atleta from atleta where id_atleta in (select atleta_fk from inscricao where competicao_fk = ? and categoria_fk = ?))) and categoria_fk = ?";
            $lutas = array();
            try{
                $stmt = $this->getConnection()->prepare($q);
                $stmt->bindValue(1,$comp);
                $stmt->bindValue(2,$categoria);
                $stmt->bindValue(3,$categoria);
                $stmt->execute();
                while($rows = $stmt->fetch()){
                    $lutas[] = new Lutas($rows["id_lutas"], $rows["tempo"], $rows["hansoku_make"], $rows["goldenscore"], $rows["categoria_fk"]);
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
        public function selectAllByAtleta($atleta_fk){
            $q = "SELECT * FROM lutas WHERE atleta_fk = ?";
            $lutas = array();
            try{
                $stmt = $this->getConnection()->prepare($q);
                $stmt->bindValue(1,$atleta_fk);
                $stmt->execute();
                while($rows = $stmt->fetch()){
                    $lutas[] = new Lutas($rows["id_lutas"], $rows["tempo"], $rows["hansoku_make"], $rows["ganhou"], $rows["goldenScore"], $rows["atleta_fk"], $rows["categoria_fk"]);
                }
            }
            catch(Exception $e){
                return false;
            }
            return $lutas;
        }
       
    }
?>