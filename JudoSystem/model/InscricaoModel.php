<?php
    require_once("./JudoSystem/model/Model.php");
    require_once("./JudoSystem/valueObject/Inscricao.php");

    class InscricaoModel extends Model{
        public function insert($obj){
            $q = "INSERT INTO inscricao(atleta_fk, competicao_fk, categoria_fk, data_inscricao, hora_inscricao) VALUES(?,?,?,current_date,current_time)";
            try{
                $stmt = $this->getConnection()->prepare($q);
                $stmt->bindValue(1,$obj->getAtleta_fk());
                $stmt->bindValue(2,$obj->getCompeticao_fk());
                $stmt->bindValue(3,$obj->getCategoria_fk());
                
                $stmt->execute();
            }catch(Exception $e){
                return false;
            }
            return true;
        }
        public function update($obj){
            $q = "UPDATE inscricao SET atleta_fk = ?,categoria_fk = ? WHERE id_inscricao = ?";
            try{
                $stmt = $this->getConnection()->prepare($q);
                $stmt->bindValue(1,$obj->getAtleta_fk());
                $stmt->bindValue(2,$obj->getCategoria_fk());
                $stmt->bindValue(3,$obj->getId_inscricao());
                
                $stmt->execute();
            }catch(Exception $e){
                return $e->getMessage();
            }
            return true;
        }
        public function delete($id){
            $q = "DELETE FROM inscricao WHERE id_inscricao";
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
            $q = "SELECT * FROM inscricao";
            $inscricao = array();
            try{
                $stmt = $this->getConnection()->prepare($q);
                $stmt->execute();
                while($rows = $stmt->fetch()){
                    $inscricao[] = new Inscricao($rows['id_inscricao'],$rows["atleta_fk"], $rows["competicao_fk"], $rows["categoria_fk"], $rows["data_inscricao"], $rows["hora_inscricao"]);
                }
            }catch(Exception $e){
                return false;
            }
            return $inscricao;
        }
        public function selectAllByAtleta($idAcademia,$competicao){

            $inscricao = array();
            try{
                $stmt = $this->getConnection()->prepare("SELECT * FROM inscricao where atleta_fk in (select id_atleta from atleta where academia_fk = ?) and competicao_fk = ?");
                $stmt->bindValue(1,$idAcademia);
                $stmt->bindValue(2,$competicao);
                $stmt->execute();
                while($rows = $stmt->fetch()){
                    $inscricao[] = new Inscricao($rows['id_inscricao'],$rows["atleta_fk"], $rows["competicao_fk"], $rows["categoria_fk"], $rows["data_inscricao"], $rows["hora_inscricao"]);
                }
            }catch(Exception $e){
                return false;
            }
            return $inscricao;
        }
        public function selectAllByAtletaDistinct($idAcademia,$competicao){

            $inscricao = array();
            try{
                $stmt = $this->getConnection()->prepare("SELECT distinct(categoria_fk) FROM inscricao where atleta_fk in (select id_atleta from atleta where academia_fk = ?) and competicao_fk = ?");
                $stmt->bindValue(1,$idAcademia);
                $stmt->bindValue(2,$competicao);
                $stmt->execute();
                while($rows = $stmt->fetch()){
                    $inscricao[] = $rows['categoria_fk'];
                }
            }catch(Exception $e){
                return false;
            }
            return $inscricao;
        }
        public function selectById($id){
            $obj = null;
            try{
                $stmt = $this->getConnection()->prepare('select * from inscricao where id_inscricao = ?');
                $stmt->bindValue(1,$id);
                $stmt->execute();
            }
            catch(Exception $e){
                return false;
            }
            $rows = $stmt->fetch();
                return $obj = new Inscricao($rows['id_inscricao'],$rows["atleta_fk"], $rows["competicao_fk"], $rows["categoria_fk"], $rows["data_inscricao"], $rows["hora_inscricao"]);
        }
    }
?>