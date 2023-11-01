<?php
    class AtletaController{
        public function showCadastro(){
            require_once("./JudoSystem/view/cadastroLutasView.php");
        }
        public function insert(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/LutasModel.php");
            require_once("./JudoSystem/valueObject/Lutas.php");
            $json = json_decode(file_get_contents("php://input"));
            $lutas = new Lutas($json->tempo,$json->hansoku_make,$json->ganhou,$json->goldenScore);

            $lutasm = new LutasModel(Model::createConnection());
            if(!$lutasm->insert($lutas)){
                die("Erro no cadastro");
            }
            echo("Cadastro realizado");
        }

        public function showUpdate(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/LutasModel.php");
            $lutasm = new LutasModel(Model::createConnection());
            require_once("./JudoSystem/view/updateLutasView.php");
        }
        public function update(){
            require_once("./JudoSystem/model/Model.php");
            require_once(".JudoSystem/model/LutasModel.php");
            require_once(".JudoSystem/valueObject/Lutas.php");
            $json = json_decode(file_get_contents("php://input"));
            $lutas = new Lutas($json->tempo,$json->hansoku_make,$json->ganhou,$json->goldenScore);
    
            $lutasm = new LutasModel(Model::createConnection());
            if(!$lutasm->update($lutas)){
                die("Erro no update");
            }
            echo("Sucesso");
        }
        public function delete(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/LutasModel.php");
    
            $json = json_decode(file_get_contents("php://input"));
            $id = $json->id;
    
            $lutasm = new LutasModel(Model::createConnection());
            if(!$lutasm->delete($id)){
                die("Erro na exclusão da luta");
            }
            echo("Luta excluída com sucesso");
        }
        public function listaAtletas(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/LutasModel.php");
    
            $lutasm = new LutasModel(Model::createConnection());
            $lutas = $lutasm->selectAll();

            header('Content-Type: application/json');
            echo json_encode($lutas);
        }
    }
?>