<?php
    
    class MainController{
        
        public function showCad(){
            require_once("./JudoSystem/controller/UserController.php");

            $uc = new UserController();
            $uc->showCadastro();

        }
    }
?>