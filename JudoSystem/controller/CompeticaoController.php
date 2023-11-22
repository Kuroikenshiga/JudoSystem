<?php
    session_start();
    class CompeticaoController{
        public function list(){
            require_once('./JudoSystem/model/CompeticaoModel.php');
            require_once('./JudoSystem/model/Model.php');
            $cm = new CompeticaoModel(Model::createConnection());
            $competicoes = $cm->selectAll();
            require_once("./JudoSystem/view/listaCompeticaoView.php");
        }
        public function seeMore(){
            function searchAtletaInList($list,$id){
                foreach($list as $l){
                    if($l->getId() == $id){
                        return $l->getNome();
                    }
                }
                return null;
            }
            require_once('./JudoSystem/model/InscricaoModel.php');
            require_once('./JudoSystem/model/CompeticaoModel.php');
            require_once('./JudoSystem/model/AtletaModel.php');
            require_once('./JudoSystem/model/Model.php');
            $cm = new CompeticaoModel(Model::createConnection());
            $im = new InscricaoModel(Model::createConnection());
            $am = new AtletaModel(Model::createConnection());
            $competicoes = $cm->selectById(isset($_GET['id'])?$_GET['id']:null);
            $inscricoes = $im->selectAllByAtleta($_SESSION['idAcademia'],$_GET['id']);
            $atletas = $am->selectAllByAcademia($_SESSION['idAcademia']);
            
            require_once('./JudoSystem/view/competicaoView.php');
        }
    }
?>