<?php
    class CompeticaoController{
        public function list(){
            require_once('./JudoSystem/model/CompeticaoModel.php');
            require_once('./JudoSystem/model/Model.php');
            $cm = new CompeticaoModel(Model::createConnection());
            $competicoes = $cm->selectAll();
            require_once("./JudoSystem/view/listaCompeticaoView.php");
        }
    }
?>