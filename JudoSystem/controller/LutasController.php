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
            $lutas = new Lutas(null,$json->tempo,$json->hansoku_make,$json->ganhou,$json->goldenScore,$json->atleta_fk,$json->categoria_fk);

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
            $lutas = new Lutas($json->$id_lutas,$json->tempo,$json->hansoku_make,$json->ganhou,$json->goldenScore,$json->atleta_fk,$json->categoria_fk);
    
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
            $id_lutas = $json->id_lutas;
    
            $lutasm = new LutasModel(Model::createConnection());
            if(!$lutasm->delete($id_lutas)){
                die("Erro na exclusão da luta");
            }
            echo("Luta excluída com sucesso");
        }
        public function list(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/LutasModel.php");
    
            $lutasm = new LutasModel(Model::createConnection());
            $lutas = $lutasm->selectAll();

            if(!$lutas){
                echo("Não existem atletas cadastrados");
            }else{
                require_once("./JudoSystem/view/listaLutasView.php");
            }
        }
        public function listByAtleta(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/LutasModel.php");
    
            $lutasm = new LutasModel(Model::createConnection());
            $lutas = $lutasm->selectAllByAtleta($atleta_fk);

            if(!$lutas){
                echo("Atleta não possui lutas");
            }else{
                require_once("./JudoSystem/view/listaLutasView.php");
            }
        }
        public function listById(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/LutasModel.php");

            $lutasm = new LutasModel(Model::createConnection());
            $lutas = $lutasm->selectById($id_lutas);

            if($lutas != false){
                require_once("./JudoSystem/view/listaLutasView.php");
            }
        }
        public function listByCategoria(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/LutasModel.php");

            $lutasm = new LutasModel(Model::createConnection());
            $lutas = $lutasm->selectAllByCategoria($categoria_fk);

            if(!$lutas){
                echo("Não possui lutas nessa categoria");
            }else{
                require_once("./JudoSystem/view/listaLutasView.php");
            }
        }
    }
?>