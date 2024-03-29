<?php
    require_once("./JudoSystem/valueObject/Podio.php");
    
    class PodioModel extends Model{


        public function insert($obj){
            $stmt = $this->getConnection()->prepare('INSERT INTO podio(
                lugar_1, lugar_2, lugar_3, lugar_3_2, pontuacao_1, pontuacao_2, pontuacao_3, pontuacao_3_2, competicao_fk, categoria_fk)
                VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

            try{
                $stmt->bindValue(1,$obj->getLugar1());
                $stmt->bindValue(2,$obj->getLugar2());
                $stmt->bindValue(3,$obj->getLugar3());
                $stmt->bindValue(4,$obj->getLugar3_2());
                $stmt->bindValue(5,$obj->getPontuacao1());
                $stmt->bindValue(6,$obj->getPontuacao2());
                $stmt->bindValue(7,$obj->getPontuacao3());
                $stmt->bindValue(8,$obj->getPontuacao3_2());
                $stmt->bindValue(9,$obj->getCompeticaoFk());
                $stmt->bindValue(10,$obj->getCategoriaFk());
                $stmt->execute();
            }
            catch(Exception $e){
                return false;
            }
            return true;
        }
        public function selectByCompeticaoAndCategoria($competicao,$categoria){
            $stmt = $this->getConnection()->prepare('SELECT * FROM Podio where competicao_fk = ? and categoria_fk = ?');
            $obj = null;
            try{
                $stmt->bindValue(1,$competicao);
                $stmt->bindValue(2,$categoria);
                $stmt->execute();
                $row = $stmt->fetch();
                $obj = !is_array($row)?null:new Podio($row['id_podio'],$row['lugar_1'],$row['lugar_2'],$row['lugar_3'],$row['lugar_3_2'],$row['pontuacao_1'],$row['pontuacao_2'],$row['pontuacao_3'],$row['pontuacao_3_2'],$row['competicao_fk'],$row['categoria_fk']);   
            }
            catch(Exception $e){
                echo $e->getMessage();
                return false;
            }
            return $obj;
        }
        public function updateByCompeticaoAndCategoria($obj){
            $stmt = $this->getConnection()->prepare('UPDATE podio
            SET lugar_1=?, lugar_2=?, lugar_3=?, lugar_3_2=?, pontuacao_1=?, pontuacao_2=?, pontuacao_3=?, pontuacao_3_2=? 
            WHERE competicao_fk=? and categoria_fk=?');

            try{
                $stmt->bindValue(1,$obj->getLugar1());
                $stmt->bindValue(2,$obj->getLugar2());
                $stmt->bindValue(3,$obj->getLugar3());
                $stmt->bindValue(4,$obj->getLugar3_2());
                $stmt->bindValue(5,$obj->getPontuacao1());
                $stmt->bindValue(6,$obj->getPontuacao2());
                $stmt->bindValue(7,$obj->getPontuacao3());
                $stmt->bindValue(8,$obj->getPontuacao3_2());
                $stmt->bindValue(9,$obj->getCompeticaoFk());
                $stmt->bindValue(10,$obj->getCategoriaFk());
                $stmt->execute();
            }
            catch(Exception $e){
                
                return false;
            }
            return true;
        
        }

        public function selectByAtleta($id){
            $stmt = $this->getConnection()->prepare('SELECT * FROM Podio where lugar_1 = ? or lugar_2 = ? or lugar_3 = ? or lugar_3_2 = ?');
            $obj = [];
            try{
                $stmt->bindValue(1,$id);
                $stmt->bindValue(2,$id);
                $stmt->bindValue(3,$id);
                $stmt->bindValue(4,$id);
                
                $stmt->execute();
                while($row = $stmt->fetch()){
                    if(!is_array($row)){
                        return $obj;
                    }
                    $obj[]= new Podio($row['id_podio'],$row['lugar_1'],$row['lugar_2'],$row['lugar_3'],$row['lugar_3_2'],$row['pontuacao_1'],$row['pontuacao_2'],$row['pontuacao_3'],$row['pontuacao_3_2'],$row['competicao_fk'],$row['categoria_fk']);   
            }
        }
            catch(Exception $e){
                echo $e->getMessage();
                return false;
            }
            return $obj;
        }

        public function updateLugar1WithNull($id){
            $stmt = $this->getConnection()->prepare('UPDATE podio set lugar_1 = null where id_podio = ?');

            try{
                $stmt->bindValue(1,$id);
                $stmt->execute();
            }
            catch(Exception $e){
                echo $e->getMessage();
                return false;
            }
            return true;
        }
        public function updateLugar2WithNull($id){
            $stmt = $this->getConnection()->prepare('UPDATE podio set lugar_2 = null where id_podio = ?');

            try{
                $stmt->bindValue(1,$id);
                $stmt->execute();
            }
            catch(Exception $e){
                echo $e->getMessage();
                return false;
            }
            return true;
        }

        public function updateLugar3WithNull($id){
            $stmt = $this->getConnection()->prepare('UPDATE podio set lugar_3 = null where id_podio = ?');

            try{
                $stmt->bindValue(1,$id);
                $stmt->execute();
            }
            catch(Exception $e){
                echo $e->getMessage();
                return false;
            }
            return true;
        }

        public function updateLugar3_2WithNull($id){
            $stmt = $this->getConnection()->prepare('UPDATE podio set lugar_3_2 = null where id_podio = ?');

            try{
                $stmt->bindValue(1,$id);
                $stmt->execute();
            }
            catch(Exception $e){
                echo $e->getMessage();
                return false;
            }
            return true;
        }
        public function update($obj){}
        public function delete($id){}
        public function selectAll(){}
        public function selectById($id){}
        
    }
?>