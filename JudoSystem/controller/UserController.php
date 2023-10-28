<?php
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
            $user = new User($json->nome,$json->senha,$json->email);

            $um = new UserModel(Model::createConnection());
            $idUser = $um->insert($user);
            if(!$idUser){
                die("Erro no cadastro");
            }
            $json = new stdClass();
            $json->way = "../../JudoSystem/view/cadastroAcademiaView.php?id=$idUser";
            echo(json_encode($json));

        }

        public function login(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/UserModel.php");
            require_once("./JudoSystem/valueObject/User.php");
            $json = json_decode(file_get_contents("php://input"));
            $um = new UserModel(Model::createConnection());
            $sucess = $um->selectByIds($json->email,$json->senha);
            if($sucess == null){
                die("NA");
           }
            if(!$sucess){
                die("erro");
            }
            $objResponse = new stdClass();
            $objResponse->way = "../../index.php?class=main&method=showMain";
            echo(json_encode($objResponse));
            
        }

        
    }

?>