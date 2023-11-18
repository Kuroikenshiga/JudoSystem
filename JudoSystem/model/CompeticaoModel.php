<?php
    require_once("./JudoSystem/model/Model.php");
    require_once("./JudoSystem/valueObject/Competicao.php");
    class CompeticaoModel extends Model{

       public function insert($obj){}
       public function update($obj){}
       public function delete($id){}

        public function selectAllLimited(){
            $q = "SELECT * FROM competicao where data_competicao >= CURRENT_DATE order by data_competicao asc limit 6";
            $competicoes = array();
            try{
                $stmt = $this->getConnection()->prepare($q);
                $stmt->execute();
                while($rows = $stmt->fetch()){
                    $competicoes[] = new Competicao($rows["id_competicao"], $rows["nome"], $rows["data_competicao"], $rows["estado"], $rows["cidade"], $rows["bairro"], $rows["complemento"],$rows["logradouro"]);
                }
            }catch(Exception $e){
                return false;
            }
            return $competicoes;
        }
        public function selectAll(){
            $q = "SELECT * FROM competicao where data_competicao >= CURRENT_DATE order by data_competicao asc";
            $competicoes = array();
            try{
                $stmt = $this->getConnection()->prepare($q);
                $stmt->execute();
                while($rows = $stmt->fetch()){
                    $competicoes[] = new Competicao($rows["id_competicao"], $rows["nome"], $rows["data_competicao"], $rows["estado"], $rows["cidade"], $rows["bairro"], $rows["complemento"],$rows["logradouro"]);
                }
            }catch(Exception $e){
                return false;
            }
            return $competicoes;
        }
        public function selectById($id){
            $competicoes = null;
            try{
                $stmt = $this->getConnection()->prepare('select * from competicao where id_competicao = ?');
                $stmt->bindValue(1,$id);
                $stmt->execute();
            }
            catch(Exception $e){
                return false;
            }
            $rows = $stmt->fetch();
            return $competicoes = new Competicao($rows["id_competicao"], $rows["nome"], $rows["data_competicao"], $rows["estado"], $rows["cidade"], $rows["bairro"], $rows["complemento"],$rows["logradouro"]);
        }

    }
?>