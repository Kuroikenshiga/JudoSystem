<?php
    class AcademiaController{
        public function showCadastro(){
            require_once("./JudoSystem/view/cadastroAcademia.php")
        }
        public function insert(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/AcademiaModel.php");
            require_once("./JudoSystem/valueObject/Academia.php");
            $json = json_decode(file_get_contents("php://input"));
            $academia = new Academia($json->num_contato,$json->nome,$json->estado,$json->cidade,$json->bairro,$json->complemento,$json->logradouro);

            $am = new AcademiaModel(Model::createConnection());
            if(!$am->insert($academia)){
                die("Erro no cadastro");
            }
            echo("Cadastro realizado");
        }
    }
?>