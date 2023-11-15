<?php
    class InscricaoController{
        public function showCadastro(){
            require_once("./JudoSystem/view/cadastroInscricaoView.php");
        }
        public function insert(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/InscricaoModel.php");
            require_once("./JudoSystem/valueObject/Inscricao.php");
            $json = json_decode(file_get_contents("php://input"));
            $inscricao = new Inscricao(null,$json->atleta_fk,$json->competicao_fk,$json->categoria_fk,$json->data_inscricao,$json->hora_inscricao);

            $insc = new InscricaoModel(Model::createConnection());
            if(!$insc->insert($inscricao)){
                die("Erro no cadastro");
            }
            echo("../../index.php?class=inscricao&method=insert");
        }

        public function showUpdate(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/InscricaoModel.php");
            $insc = new InscricaoModel(Model::createConnection());
            $inscricao = $insc->selectById($_GET['id_inscricao']);
            require_once("./JudoSystem/view/updateInscricaoView.php");
        }
        public function update(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/InscricaoModel.php");
            require_once("./JudoSystem/valueObject/Inscricao.php");
            $json = json_decode(file_get_contents("php://input"));
            $inscricao = new Inscricao($json->id_inscricao,$json->atleta_fk,$json->competicao_fk,$json->categoria_fk,$json->data_inscricao,$json->hora_inscricao);

            $insc = new InscricaoModel(Model::createConnection());
            if(!$insc->update($inscricao)){
                die("Erro no update");
            }
            echo("../../index.php?class=inscricao&method=update");
        }
        public function delete(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/InscricaoModel.php");

            $json = json_decode(file_get_contents("php://input"));
            $id_inscricao = $json->id_inscricao;

            $insc = new InscricaoModel(Model::createConnection());
            if(!$insc->delete($id_inscricao)){
                die("Erro na exclusão da inscrição");
            }
            echo("Inscrição excluída com sucesso");
        }
        public function list(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/InscricaoModel.php");
            $insc = new InscricaoModel(Model::createConnection());
            $inscricao = $insc->selectAll();

            if(!$inscricao){
                echo("Não existem inscrições cadastradas");
            }else{
                require_once("./JudoSystem/view/listaInscricaoView.php");
            }
        }
    }
?>