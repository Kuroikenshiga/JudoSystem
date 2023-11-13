<?php
    require_once("./JudoSystem/model/Model.php");
    require_once("./JudoSystem/valueObject/Competicao.php");
    class CompeticaoModel extends Model{

       public function insert($obj){}
       public function update($obj){}
       public function delete($id){}

        public function selectAll(){
            $q = "SELECT * FROM competicao";
            $competicoes = array();
            try{
                $stmt = $this->getConnection()->prepare($q);
                $stmt->execute();
                while($rows = $stmt->fetch()){
                    $competicoes[] = new Competicao($rows["id_competições"], $rows["nome"], $rows["data_competicao"], $rows["estado"], $rows["cidade"], $rows["bairro"], $rows["complemento"],$rows["logradouro"]);
                }
            }catch(Exception $e){
                return false;
            }
            return $competicoes;
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
                return $obj = new Atleta($rows["id_atleta"], $rows["nome"], $rows["faixa"], $rows["genero"], $rows["data_nascimento"], $rows["pontuacao"], $rows["id_academia_fk"]);
        }

    }
?>