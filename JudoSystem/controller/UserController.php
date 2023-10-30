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
            $json = json_decode(file_get_contents("php://input"));
            $user = new User(null,$json->nome,$json->senha,$json->email);

            $um = new UserModel(Model::createConnection());
            $idUser = $um->insert($user);
            if(!$idUser){
                die("Erro no cadastro");
            }
            $json = new stdClass();
            $json->way = "index.php?class=academia&method=showCadastro";

            echo(json_encode($json));
            $_SESSION['idUser'] = $idUser;
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