<?php
    session_start();
    class InscricaoController{
        public function showCadastro(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/CategoriaModel.php");
            $cm = new CategoriaModel(Model::createConnection());
            $categorias = $cm->selectAllClasses();
            
            require_once("./JudoSystem/view/cadastraInscricaoView.php");
        }
        public function insert(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/InscricaoModel.php");
            require_once("./JudoSystem/model/CategoriaModel.php");
            require_once("./JudoSystem/valueObject/Inscricao.php");

            $json = json_decode(file_get_contents("php://input"));

            $cm = new CategoriaModel(Model::createConnection());
            
            $idCategoria = $cm->selectCategoria($json->genero,$json->classe,$json->peso);
            $inscricao = new Inscricao(null,$json->atleta,$json->competicao,$idCategoria,null,null);

            $insc = new InscricaoModel(Model::createConnection());
            if(!$insc->insert($inscricao)){
                die("Erro no cadastro");
            }
            $response = new stdClass();
            $response->way = ("../../index.php?class=competicao&method=seeMore&id=$json->competicao");
            echo json_encode($response);
        }

        public function showUpdate(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/InscricaoModel.php");
            require_once("./JudoSystem/model/AtletaModel.php");
            require_once("./JudoSystem/model/CategoriaModel.php");
            function getAtleta($id,$list){
                foreach($list as $l){
                    if($l->getId() == $id){
                        return $l;
                    }
                }
                return null;
            }
            $cm = new CategoriaModel(Model::createConnection());
            $classes = $cm->selectAllClasses();

            $am = new AtletaModel(Model::createConnection());
            $atletas = $am->selectAllByAcademia($_SESSION['idAcademia']);
            
            $im = new InscricaoModel(Model::createConnection());
            $inscricao = $im->selectById($_GET['id_inscricao']);
            
            $categoria = $cm->selectById($inscricao->getCategoria_fk());
            $pesos = $cm->selectAllPesosPorGeneros($categoria->getGenero(),$categoria->getClasse());
            require_once("./JudoSystem/view/updateInscricaoView.php");
        }
        public function update(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/InscricaoModel.php");
            require_once("./JudoSystem/valueObject/Inscricao.php");
            require_once("./JudoSystem/model/CategoriaModel.php");
            $json = json_decode(file_get_contents("php://input"));
            $cm = new CategoriaModel(Model::createConnection());
            $idCategoria = $cm->selectCategoria($json->genero,$json->classe,$json->peso);

            $inscricao = new Inscricao($json->id,$json->atleta,$json->competicao,$idCategoria,null,null);

            $insc = new InscricaoModel(Model::createConnection());
            if(!$insc->update($inscricao)){
                die($insc->update($inscricao));
            } 
            $response = new stdClass();
            $response->way = ("../../index.php?class=competicao&method=seeMore&id=".$_GET['id']);
            echo json_encode($response);
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
        public function listById(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/InscricaoModel.php");

            $insc = new InscricaoModel(Model::createConnection());
            $inscricao = $insc->selectById($id_inscricao);

            if($inscricao != false){
                require_once("./JudoSystem/view/listaInscricaoView.php");
            }
        }

       
    }
?>