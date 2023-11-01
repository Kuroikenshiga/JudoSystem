<?php
    class AtletaController{
        public function showCadastro(){
            require_once("./JudoSystem/view/cadastroAtletaView.php");
        }
        public function insert(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/AtletaModel.php");
            require_once("./JudoSystem/valueObject/Atleta.php");
            $json = json_decode(file_get_contents("php://input"));
            $atleta = new Atleta($json->nome,$json->faixa,$json->genero,$json->data_nascimento,$json->pontuacao);

            $atl = new AtletaModel(Model::createConnection());
            if(!$atl->insert($atleta)){
                die("Erro no cadastro");
            }
            echo("Cadastro realizado");
        }

        public function showUpdate(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/AtletaModel.php");
            $atl = new AtletaModel(Model::createConnection());
            require_once("./JudoSystem/view/updateAtletaView.php");
        }
        public function update(){
            require_once("./JudoSystem/model/Model.php");
            require_once(".JudoSystem/model/AtletaModel.php");
            require_once(".JudoSystem/valueObject/Atleta.php");
            $json = json_decode(file_get_contents("php://input"));
            $atleta = new Atleta($json->nome,$json->faixa,$json->genero,$json->data_nascimento,$json->pontuacao);
    
            $atl = new AtletaModel(Model::createConnection());
            if(!$atl->update($atleta)){
                die("Erro no update");
            }
            echo("Sucesso");
        }
        public function delete(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/AtletaModel.php");
    
            $json = json_decode(file_get_contents("php://input"));
            $id = $json->id;
    
            $atl = new AtletaModel(Model::createConnection());
            if(!$atl->delete($id)){
                die("Erro na exclusão do atleta");
            }
            echo("Atleta excluído com sucesso");
        }
        public function listaAtletas(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/AtletaModel.php");
    
            $atl = new AtletaModel(Model::createConnection());
            $atletas = $atl->selectAll();

            header('Content-Type: application/json');
            echo json_encode($atletas);
        }
    }
?>