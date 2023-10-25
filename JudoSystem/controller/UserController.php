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
            $user = new User($json->nome,$json->senha);

            $um = new UserModel(Model::createConnection());
            if(!$um->insert($user)){
                die("Erro no cadastro");
            }
            echo("Cadastro realizado");

        }

        public function login(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/UserModel.php");
            require_once("./JudoSystem/valueObject/User.php");
            $json = json_decode(file_get_contents("php://input"));
            $um = new UserModel(Model::createConnection());
            $sucess = $um->selectByIds($json->nome,$json->senha);
            if($sucess == null){
                die("Usuário não existe");
           }
            if(!$sucess){
                die("Erro no Login");
            }
         
            echo("Logado");
            
        }
    }

?>