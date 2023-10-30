<?php
    require_once("./JudoSystem/model/Model.php");
    require_once("./JudoSystem/valueObject/User.php");
    class UserModel extends Model{

        public function insert($obj){
            $q = "insert into usuario(nome, senha,email) values (?,?,?) returning id_usuario";
            try{
                $stmt = $this->getConnection()->prepare($q);
                $stmt->bindValue(1,$obj->getNome());
                $stmt->bindValue(2,$obj->getSenha());
                $stmt->bindValue(3,$obj->getEmail());
                $stmt->execute();
            }catch(Exception $e){
                return $e->getMessage();
            }
            return $stmt->fetch()['id_usuario'];
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
                    $users[] = new User($rows['id_usuario'],$rows["nome"],$rows["senha"],$rows["email"]);
                }
            }catch(Exception $e){
                return false;
            }
            return $users;
           
        }
        public function selectById($id){
            
        }
        public function selectByIds($email,$senha){
            $q = "select*from usuario where email = ? and senha = ?";
            $user = null;
            try{
                $stmt = $this->getConnection()->prepare($q);
                $stmt->bindValue(1,$email);
                $stmt->bindValue(2,$senha);
                $stmt->execute();
                $rows = $stmt->fetch();
                
                $user = count(is_countable($rows)?$rows:array())?new User($rows['id_usuario'],$rows["nome"],$rows["senha"],$rows["email"]):null;
                  
            }catch(Exception $e){
                $e->getMessage();
                return false;
            }
            return $user;
        }
    }

?>