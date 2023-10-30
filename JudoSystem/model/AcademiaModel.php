<?php
    require_once("./JudoSystem/model/Model.php");
    require_once("./JudoSystem/valueObject/Academia.php");
    class AcademiaModel extends Model{

            public function insert($obj){
                $q = "INSERT INTO academia(numero_contato, nome, estado, cidade, bairro, complemento, logradouro,usuario_fk) VALUES (?,?,?,?,?,?,?,?)";
                try{
                    $stmt = $this->getConnection()->prepare($q);
                    $stmt->bindValue(1,$obj->getNumero());
                    $stmt->bindValue(2,$obj->getNome());
                    $stmt->bindValue(3,$obj->getEstado());
                    $stmt->bindValue(4,$obj->getCidade());
                    $stmt->bindValue(5,$obj->getBairro());
                    $stmt->bindValue(6,$obj->getComplemento());
                    $stmt->bindValue(7,$obj->getLogradouro());
                    $stmt->bindValue(8,$obj->getUser());
                    $stmt->execute();
                }catch(Exception $e){
                    return false;
                }
                return true;
            }
            public function update($obj){
                try{
                    $stmt = $this->getConnection()->prepare('update academia set numero_contato = ?,nome = ?,estado = ?, cidade = ?, bairro = ?,complemento = ?,logradouro = ? where id_academia = ?');
                    $stmt->bindValue(1,$obj->getNumero());
                    $stmt->bindValue(2,$obj->getNome());
                    $stmt->bindValue(3,$obj->getEstado());
                    $stmt->bindValue(4,$obj->getCidade());
                    $stmt->bindValue(5,$obj->getBairro());
                    $stmt->bindValue(6,$obj->getComplemento());
                    $stmt->bindValue(7,$obj->getLogradouro());
                    $stmt->bindValue(8,$obj->getId());
                    $stmt->execute();
                }catch(Exception $e){
                    return false;
                }
                return true;
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
                        $academia[] = new Academia($rows["id_academia"],$rows["numero_contato"], $rows["nome"], $rows["estado"], $rows["cidade"], $rows["bairro"], $rows["complemento"], $rows["logradouro"],$rows["usuario_fk"]);
                    }
                }catch(Exception $e){
                    return false;
                }
                return $academia;
            }
            public function selectById($id){
                $obj = null;
                try{
                    $stmt = $this->getConnection()->prepare('select * from academia where id_academia = ?');
                    $stmt->bindValue(1,$id);
                    $stmt->execute();
                }
                catch(Exception $e){
                    return false;
                }
                $rows = $stmt->fetch();
                return $obj = new Academia($rows["id_academia"],$rows["numero_contato"], $rows["nome"], $rows["estado"], $rows["cidade"], $rows["bairro"], $rows["complemento"], $rows["logradouro"],$rows["usuario_fk"]);
            
            }

            public function selectByUser($user){
                $obj = null;
                try{
                    $stmt = $this->getConnection()->prepare('select * from academia where usuario_fk = ?');
                    $stmt->bindValue(1,$user);
                    $stmt->execute();
                }
                catch(Exception $e){
                    return false;
                }
                $rows = $stmt->fetch();
                return $obj = new Academia($rows["id_academia"],$rows["numero_contato"], $rows["nome"], $rows["estado"], $rows["cidade"], $rows["bairro"], $rows["complemento"], $rows["logradouro"],$rows["usuario_fk"]);
            }
            
    }
?>