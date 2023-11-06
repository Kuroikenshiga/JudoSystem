<?php
    if(!isset($_SESSION)){
        session_start();
    }
    
    class UserController{
        public function showLogin(){
            require_once("./JudoSystem/view/loginView.php");
        }
        public function showCadastro(){
            require_once("./JudoSystem/view/cadastroUsuario.php");
        }

        public function insert(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/UserModel.php");
            require_once("./JudoSystem/valueObject/User.php");
            require_once("./JudoSystem/model/AcademiaModel.php");
            require_once("./JudoSystem/valueObject/Academia.php");
            $json = json_decode(file_get_contents("php://input"));
            $user = new User(null,$json->nome,$json->senha,$json->email);
            
            
            
            $um = new UserModel(Model::createConnection());
            $am = new AcademiaModel(Model::createConnection());
            Model::getConnectionOfModel()->beginTransaction();

            $idUser = $um->insert($user);
            
            if(!$idUser){
                Model::getConnectionOfModel()->rollBack();
                die("Erro no cadastro de usuário");
            }
            
            $academia = new Academia(null,$json->academia->numero,$json->academia->nome,$json->academia->estado,$json->academia->cidade,$json->academia->bairro,$json->academia->complemento,$json->academia->logradouro,$idUser);
            
            if(!$am->insert($academia)){
                Model::getConnectionOfModel()->rollBack();
                die("Erro no cadastro de academia");
            }
            Model::getConnectionOfModel()->commit();
            $json = new stdClass();
            $json->way = "index.php?class=user&method=showLogin";

            echo(json_encode($json));
            
        }

        public function login(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/UserModel.php");
            require_once("./JudoSystem/valueObject/User.php");
            require_once("./JudoSystem/model/AcademiaModel.php");
            $json = json_decode(file_get_contents("php://input"));
            $um = new UserModel(Model::createConnection());
            $objSucess = $um->selectByIds($json->email,$json->senha);
            if($objSucess == null){
                die("NA");
           }
            if(!$objSucess){
                die("erro");
            }
            $_SESSION['idUser'] = $objSucess->getId();
            $am = new AcademiaModel(Model::createConnection());

            $_SESSION['idAcademia'] = $am->selectByUser($objSucess->getId())->getId();
            
            $objResponse = new stdClass();
            $objResponse->way = "../../index.php?class=main&method=showMain";
            echo(json_encode($objResponse));
            
        }  

        
    }

?>