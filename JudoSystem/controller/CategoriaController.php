<?php
    class CategoriaController{
        public function listPesoPorGenero(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/CategoriaModel.php");
            
            $g = !isset($_GET['genero'])?null:$_GET['genero'];
            $c = !isset($_GET['classe'])?null:$_GET['classe'];
            $cm = new CategoriaModel(Model::createConnection());
            $pesos = $cm->selectAllPesosPorGeneros($g,$c);

            echo json_encode($pesos);
        }
    }
?>