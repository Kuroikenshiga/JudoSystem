<?php
    session_start();
    class AtletaController{
        public function showCadastro(){
            require_once("./JudoSystem/view/cadastroAtletaView.php");
        }
        public function insert(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/AtletaModel.php");
            require_once("./JudoSystem/valueObject/Atleta.php");
            $json = json_decode(file_get_contents("php://input"));
            $atleta = new Atleta(null,$json->nome,$json->faixa,$json->genero,$json->data_nascimento,$json->pontuacao,$_SESSION['idAcademia']);

            $atl = new AtletaModel(Model::createConnection());
            if(!$atl->insert($atleta)){
                die("Erro no cadastro");
            }
            echo("../../index.php?class=atleta&method=list");
        }

        public function showUpdate(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/AtletaModel.php");
            $atl = new AtletaModel(Model::createConnection());
            $atleta = $atl->selectById($_GET['id_atleta']);
          
            require_once("./JudoSystem/view/updateAtletaView.php");
        }
        public function update(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/AtletaModel.php");
            require_once("./JudoSystem/valueObject/Atleta.php");
            $json = json_decode(file_get_contents("php://input"));
            $atleta = new Atleta($json->id,$json->nome,$json->faixa,$json->genero,$json->data_nascimento,$json->pontuacao,$_SESSION['idAcademia']);
    
            $atl = new AtletaModel(Model::createConnection());
            if(!$atl->update($atleta)){
                die("Erro no update");
            }
            echo("../../index.php?class=atleta&method=list");
        }
        public function delete(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/AtletaModel.php");
            require_once("./JudoSystem/model/LutasModel.php");
            require_once("./JudoSystem/model/LutadoresModel.php");
            require_once("./JudoSystem/model/InscricaoModel.php");
            require_once("./JudoSystem/model/PodioModel.php");
            $json = json_decode(file_get_contents("php://input"));
            $id = $json->id;
            $ldtM = new LutadoresModel(Model::createConnection());
            $lm = new LutasModel(Model::createConnection());
            $atl = new AtletaModel(Model::createConnection());
            $im = new InscricaoModel(Model::createConnection());
            $pm = new PodioModel(Model::createConnection());

            Model::getConnectionOfModel()->beginTransaction();
            $lutadores = $ldtM->selectAllByAtleta($id);

            $lutas = [];

            foreach($lutadores as $l){
                $lutas[] = $lm->selectById($l->getLuta_fk());
            }

            foreach($lutas as $l){
                if(!$ldtM->deleteFromLutas($l->getIdLutas())){
                    Model::getConnectionOfModel()->rollBack();
                    die('Erro ao excluir lutadores');
                }

                if(!$lm->delete($l->getIdLutas())){
                    Model::getConnectionOfModel()->rollBack();
                    die('Erro ao excluir lutas');
                }

            }

            if(!$im->deleteFromAtleta($id)){
                Model::getConnectionOfModel()->rollBack();
                die('Erro ao excluir as incrições do atleta');
            }
            $podios = $pm->selectByAtleta($id);

            foreach($podios as $p){
                if($p->getLugar1() == $id){
                    if(!$pm->updateLugar1WithNull($p->getIdPodio())){
                        Model::getConnectionOfModel()->rollBack();
                        die('Erro ao atualizar pódios 1');
                    }
                }
                if($p->getLugar2() == $id){
                    if(!$pm->updateLugar2WithNull($p->getIdPodio())){
                        Model::getConnectionOfModel()->rollBack();
                        die('Erro ao atualizar pódios 2');
                    }
                }
                if($p->getLugar3() == $id){
                    if(!$pm->updateLugar3WithNull($p->getIdPodio())){
                        Model::getConnectionOfModel()->rollBack();
                        die('Erro ao atualizar pódios 3');
                    }
                }
                if($p->getLugar3_2() == $id){
                    if(!$pm->updateLugar3_2WithNull($p->getIdPodio())){
                        Model::getConnectionOfModel()->rollBack();
                        die('Erro ao atualizar pódios 3_2');
                    }
                }
            }


            if(!$atl->delete($id)){
                Model::getConnectionOfModel()->rollBack();
                die("Erro na exclusão do atleta");
            }//Fala com Marcelo sobre a questão do Podio
            //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            Model::getConnectionOfModel()->commit();

            $atletas = $atl->selectAllByAcademia($_SESSION['idAcademia']);
            $atletasStdClass = [];
            foreach($atletas as $at){
                $atletasStdClass[] = $at->toStdClass();
            }
            echo(json_encode($atletasStdClass));
        }

        public function list(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/AtletaModel.php");
    
            $atl = new AtletaModel(Model::createConnection());
            $atleta = $atl->selectAllByAcademia($_SESSION['idAcademia']);

           
                require_once("./JudoSystem/view/listaAtletaView.php");
            
        }
        public function listById(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/AtletaModel.php");
    
            $atl = new AtletaModel(Model::createConnection());
            $atleta = $atl->selectById($id);

            
            if($atleta != false){
                require_once("./JudoSystem/view/listaAtletaView.php");
            }
        }
        public function listByCategoriaAndNome(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/AtletaModel.php");

            $am = new AtletaModel(Model::createConnection());
            $atletas = $am->selectAtletaByCategoriaAndNome(isset($_POST['id'])?$_POST['id']:null,isset($_POST['nome'])?$_POST['nome']:null,isset($_POST['comp'])?$_POST['comp']:null);
            
            $json = [];

            foreach($atletas as $at){
                $json[] = $at->toStdClass();
            }

            echo json_encode($json);
        }
        public function listAtletaJson(){
            $nome = $_GET['nome'];
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/AtletaModel.php");
            $json = [];
            $atl = new AtletaModel(Model::createConnection());
            $s = $atl->selectFiltred($nome);
            if(!$s and !is_countable($s)){
                
                die($s);
            }
            

            foreach($s as $at){
                $json[] = $at->toStdClass();
            }

            echo json_encode($json);

        }

        
    }
?>