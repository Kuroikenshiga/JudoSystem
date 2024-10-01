<?php
    session_start();
    class MainController{
        
        public function showCad(){
            require_once("./JudoSystem/controller/UserController.php");

            $uc = new UserController();
            $uc->showCadastro();

        }

        public function showMain(){
            require_once('./JudoSystem/model/CompeticaoModel.php');
            require_once('./JudoSystem/model/Model.php');
            require_once('./JudoSystem/reports/AtletasReports.php');
            $ar = new AtletaReports(Model::createConnection());
            $cm = new CompeticaoModel(Model::createConnection());
            $competicoes = $cm->selectAllLimited();
            $report = $ar->categoriaReport();
            $genderReport = $ar->atletaGenderReport();
            $medalhas = $ar->medalRelationship();
            $array = $ar->defeatRelationship();
            
            require_once("./JudoSystem/view/principal.php");
        }
        public function logout(){
            
            session_destroy();
            header("location: index.php?class=user&method=showLogin");
        }
    }
?>