<?php
    require_once("./JudoSystem/model/Model.php");
    require_once("./JudoSystem/valueObject/User.php");
    class UserModel extends Model{

        public function insert($obj){
            $q = "insert into usuario(nome, senha) values (?,?)";
            try{
                $stmt = $this->getConnection()->prepare($q);
                $stmt->bindValue(1,$obj->getNome());
                $stmt->bindValue(2,$obj->getSenha());
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
            $q = "select*from usuario";
            $users = array();
            try{
                $stmt = $this->getConnection()->prepare($q);
                $stmt->execute();
                while($rows = $stmt->fetch()){
                    $users[] = new User($rows["nome"],$rows["senha"]);
                }
            }catch(Exception $e){
                return false;
            }
            return $users;
           
        }
        public function selectById($id){
            
        }
        public function selectByIds($id1,$id2){
            $q = "select*from usuario where nome = ? and senha = ?";
            $user = null;
            try{
                $stmt = $this->getConnection()->prepare($q);
                $stmt->bindValue(1,$id1);
                $stmt->bindValue(2,$id2);
                $stmt->execute();
                $rows = $stmt->fetch();
                
                $user = count(is_countable($rows)?$rows:array())?new User($rows["nome"],$rows["senha"]):null;
                  
            }catch(Exception $e){
                $e->getMessage();
                return false;
            }
            return $user;
        }
    }

?>