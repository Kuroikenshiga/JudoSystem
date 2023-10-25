<?php
    require_once("./JudoSystem/model/Model.php");
    require_once("./JudoSystem/valueObject/Academia.php");
    class AcademiaModel extends Model{

            public function insert($obj){
                $q = "INSERT INTO academia(num_contato, nome, estado, cidade, bairro, complemento, logradouro) VALUES (?,?,?,?,?,?,?)";
                try{
                    $stmt = $this->getConnection()->prepare($q);
                    $stmt->bindValue(1,$obj->getNum_contato());
                    $stmt->bindValue(2,$obj->getNome());
                    $stmt->bindValue(3,$obj->getEstado());
                    $stmt->bindValue(4,$obj->getCidade());
                    $stmt->bindValue(5,$obj->getBairro());
                    $stmt->bindValue(6,$obj->getComplemento());
                    $stmt->bindValue(7,$obj->getLogradouro());
                    $stmt->execute();
                }catch(Exception $e){
                    return false;
                }
                return true;
            }
            public function update($obj){

            }
            public function delete($id){

            }
            public function selectAll(){
                $q = "SELECT * FROM academia";
                $academia = array();
                try{
                    $stmt = $this->getConnection()->prepare($q);
                    $stmt->execute();
                    while($rows = $stmt->fetch()){
                        $academia[] = new Academia($rows["num_contato"], $rows["nome"], $rows["estado"], $rows["cidade"], $rows["bairro"], $rows["complemento"], $rows["logradouro"]);
                    }
                }catch(Exception $e){
                    return false;
                }
                return $academia;
            }
            public function selectById($id){
            
            }
            
    }
?>