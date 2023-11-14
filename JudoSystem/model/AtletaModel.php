<?php
    session_start();
    require_once("./JudoSystem/model/Model.php");
    require_once("./JudoSystem/valueObject/Atleta.php");
    class AtletaModel extends Model{

        public function insert($obj){
            $q = "INSERT INTO atleta(nome, faixa, genero, data_nascimento, pontuacao, academia_fk) VALUES (?,?,?,?,?,?)";
            try{
                $stmt = $this->getConnection()->prepare($q);
                $stmt->bindValue(1,$obj->getNome());
                $stmt->bindValue(2,$obj->getFaixa());
                $stmt->bindValue(3,$obj->getGenero());
                $stmt->bindValue(4,$obj->getData_Nascimento());
                $stmt->bindValue(5,$obj->getPontuacao());
                $stmt->bindValue(6,$obj->getAcademia());
                $stmt->execute();
            }catch(Exception $e){
                return false;
            }
            return true;
        }
        public function update($obj){
            $q = "UPDATE atleta SET nome = ?, faixa = ?, genero = ?, data_nascimento = ?, pontuacao = ? WHERE id_atleta = ?";
            try{
                $stmt = $this->getConnection()->prepare($q);
                $stmt->bindValue(1,$obj->getNome());
                $stmt->bindValue(2,$obj->getFaixa());
                $stmt->bindValue(3,$obj->getGenero());
                $stmt->bindValue(4,$obj->getData_Nascimento());
                $stmt->bindValue(5,$obj->getPontuacao());
                $stmt->bindValue(6,$obj->getAcademia());
                $stmt->execute();
            }catch(Exception $e){
                return false;
            }
            return true;
        }
        public function delete($id){
            $q = "DELETE FROM atleta WHERE id_atleta=?";
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
            $q = "SELECT * FROM atleta";
            $atleta = array();
            try{
                $stmt = $this->getConnection()->prepare($q);
                $stmt->execute();
                while($rows = $stmt->fetch()){
                    $atleta[] = new Atleta($rows["nome"], $rows["faixa"], $rows["genero"], $rows["data_nascimento"], $rows["pontuacao"], $rows["academia_fk"]);
                }
            }catch(Exception $e){
                return false;
            }
            return $atleta;
        }
        public function selectAllByAcademia($academia){
            $q = "SELECT * FROM atleta WHERE academia_fk = ?";
            $atleta = array();
            try{
                $stmt = $this->getConnection()->prepare($q);
                $stmt->bindValue(1,$academia);
                $stmt->execute();
                while($rows = $stmt->fetch()){
                    $atleta[] = new Atleta($rows["nome"], $rows["faixa"], $rows["genero"], $rows["data_nascimento"], $rows["pontuacao"], $rows["academia_fk"]);
                }
            }catch(Exception $e){
                return false;
            }
            return $atleta;
        }
        public function selectById($id){
            $obj = null;
            try{
                $stmt = $this->getConnection()->prepare('select * from atleta where id_atleta = ?');
                $stmt->bindValue(1,$id);
                $stmt->execute();
            }
            catch(Exception $e){
                return false;
            }
            $rows = $stmt->fetch();
                return $obj = new Atleta($rows["nome"], $rows["faixa"], $rows["genero"], $rows["data_nascimento"], $rows["pontuacao"], $rows["academia_fk"]);
        }

    }
?>