<?php
    session_start();
    class MainController{
        
        public function showCad(){
            require_once("./JudoSystem/controller/UserController.php");

            $uc = new UserController();
            $uc->showCadastro();

        }

        public function showMain(){
            require_once("./JudoSystem/view/principal.php");
        }
        public function logout(){
            echo $_SESSION['idUser'];
            
        }
    }
?>