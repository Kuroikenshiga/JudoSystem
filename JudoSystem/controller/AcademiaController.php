<?php
    session_start();
    class AcademiaController{
        
        public function showCadastro(){
            require_once("./JudoSystem/view/cadastroAcademiaView.php");
        }
        public function insert(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/AcademiaModel.php");
            require_once("./JudoSystem/valueObject/Academia.php");
            $json = json_decode(file_get_contents("php://input"));
            $academia = new Academia(null,$json->numero,$json->nome,$json->estado,$json->cidade,$json->bairro,$json->complemento,$json->logradouro,$_SESSION['idUser']);
            
            $am = new AcademiaModel(Model::createConnection());
            if(!$am->insert($academia)){
                die("Erro no cadastro");
            }
            echo("Cadastro realizado");
        }

        public function showUpdate(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/AcademiaModel.php");
            $am = new AcademiaModel(Model::createConnection());
            $academia = $am->selectById($_SESSION['idAcademia']);
            require_once("./JudoSystem/view/updateAcademiaView.php");
        }
        public function update(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/AcademiaModel.php");
            require_once("./JudoSystem/valueObject/Academia.php");
            $json = json_decode(file_get_contents("php://input"));
            $academia = new Academia($_SESSION['idAcademia'],$json->numero,$json->nome,$json->estado,$json->cidade,$json->bairro,$json->complemento,$json->logradouro,$_SESSION['idUser']);
            
            $am = new AcademiaModel(Model::createConnection());
            if(!$am->update($academia)){
                die("Erro no update");
            }
            echo("Sucesso");
        }
    
}
?>