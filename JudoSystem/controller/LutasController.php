<?php
    class LutasController{
        public function showCadastro(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/AtletaModel.php");
            require_once("./JudoSystem/model/GolpesModel.php");
            require_once("./JudoSystem/model/GolpesSoloModel.php");
            $am = new AtletaModel(Model::createConnection());
            $atletas = $am->selectAtletaByCategoriaAndCompeticao(isset($_GET['id'])?$_GET['id']:null,isset($_GET['comp'])?$_GET['comp']:null);
            $gm = new GolpesModel(Model::createConnection());
            $gsm = new GolpesSoloModel(Model::createConnection());

            $golpesSolo = $gsm->selectAll();
            $golpes = $gm->selectAll();

            require_once("./JudoSystem/view/cadastroLutasView.php");

        }
        public function insert(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/LutasModel.php");
            require_once("./JudoSystem/model/LutadoresModel.php");
            require_once("./JudoSystem/valueObject/Lutas.php");
            $json = json_decode(file_get_contents("php://input"));
            //die(file_get_contents("php://input"));
            $lutas = new Lutas(null,$json->luta->tempo,$json->luta->hansokumake,$json->luta->goldenScore,$json->luta->categoria);
            
            $lm = new LutasModel(Model::createConnection());
            
            $ltdM = new LutadoresModel(Model::createConnection());
            // echo spl_object_hash(new PDO("pgsql: host=localhost; port=5432; dbname=JudoSystem; password=mqrlg; user=postgres")).'\n';
            // echo spl_object_hash($lm->getConnection()).'\n';
            // die(spl_object_hash($ltdM->getConnection()));

            $lm->getConnection()->beginTransaction();
            $idLuta = $lm->insert($lutas);
            if(!$idLuta){
                $lm->getConnection()->rollBack();
                //die('Erro em lutas');
            }
            $l1 = new Lutadores(null,$json->oponente1->atleta,$json->oponente1->w1,$json->oponente1->w2,$json->oponente1->ippon,$json->oponente1->neWaza,$json->oponente1->tecnica,$json->oponente1->forca,$json->oponente1->condFisico,$json->oponente1->qtdFaltas,$json->oponente1->vencedor,$idLuta);
            $l2 = new Lutadores(null,$json->oponente2->atleta,$json->oponente2->w1,$json->oponente2->w2,$json->oponente2->ippon,$json->oponente2->neWaza,$json->oponente2->tecnica,$json->oponente2->forca,$json->oponente2->condFisico,$json->oponente2->qtdFaltas,$json->oponente2->vencedor,$idLuta);
            if(!$ltdM->insert($l1) || !$ltdM->insert($l2)){
                $lm->getConnection()->rollBack();
                die('Erro em lutadores');
            }
            $lm->getConnection()->commit();
            echo 'Funcionou';
        }

        public function showUpdate(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/AtletaModel.php");
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/LutasModel.php");
            require_once("./JudoSystem/model/LutadoresModel.php");
            require_once("./JudoSystem/model/GolpesModel.php");
            require_once("./JudoSystem/model/GolpesSoloModel.php");

            $lm = new LutasModel(Model::createConnection());
            $ltdM = new LutadoresModel(Model::createConnection());
            $lutadores = $ltdM->selectAllByLuta(isset($_GET['id_lutas'])?$_GET['id_lutas']:null);

            $gm = new GolpesModel(Model::createConnection());
            $gsm = new GolpesSoloModel(Model::createConnection());

            $golpesSolo = $gsm->selectAll();
            $golpes = $gm->selectAll();

            $luta = $lm->selectById(isset($_GET['id_lutas'])?$_GET['id_lutas']:null);
            $am = new AtletaModel(Model::createConnection());
            $atletas = $am->selectAtletaByCategoriaAndCompeticao(isset($_GET['categoria'])?$_GET['categoria']:null,isset($_GET['comp'])?$_GET['comp']:null);

            function getAtletaNome($id,$atletas){
                foreach($atletas as $at){
                    if($at->getId() == $id){
                        return $at->getNome();
                    }
                    
                }
                return 'Atleta externo';
            }
            require_once("./JudoSystem/view/updateLutasView.php");
        }
        public function update(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/LutasModel.php");
            require_once("./JudoSystem/model/LutadoresModel.php");
            require_once("./JudoSystem/valueObject/Lutas.php");
            $json = json_decode(file_get_contents("php://input"));
            //die(file_get_contents("php://input"));
            $lutas = new Lutas($json->luta->id,$json->luta->tempo,$json->luta->hansokumake,$json->luta->goldenScore,$json->luta->categoria);
            
            $lm = new LutasModel(Model::createConnection());
            
            $ltdM = new LutadoresModel(Model::createConnection());
            // echo spl_object_hash(new PDO("pgsql: host=localhost; port=5432; dbname=JudoSystem; password=mqrlg; user=postgres")).'\n';
            // echo spl_object_hash($lm->getConnection()).'\n';
            // die(spl_object_hash($ltdM->getConnection()));

            $lm->getConnection()->beginTransaction();
            $idLuta = $lm->update($lutas);
            if(!$idLuta){
                $lm->getConnection()->rollBack();
                //die('Erro em lutas');
            }
            $l1 = new Lutadores($json->oponente1->id,$json->oponente1->atleta,$json->oponente1->w1,$json->oponente1->w2,$json->oponente1->ippon,$json->oponente1->neWaza,$json->oponente1->tecnica,$json->oponente1->forca,$json->oponente1->condFisico,$json->oponente1->qtdFaltas,$json->oponente1->vencedor,null);
            $l2 = new Lutadores($json->oponente2->id,$json->oponente2->atleta,$json->oponente2->w1,$json->oponente2->w2,$json->oponente2->ippon,$json->oponente2->neWaza,$json->oponente2->tecnica,$json->oponente2->forca,$json->oponente2->condFisico,$json->oponente2->qtdFaltas,$json->oponente2->vencedor,null);
            if(!$ltdM->update($l1) || !$ltdM->update($l2)){
                $lm->getConnection()->rollBack();
                die('Erro em lutadores');
            }
            $lm->getConnection()->commit();
            echo 'OK';
        }
        public function delete(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/LutasModel.php");
            require_once("./JudoSystem/model/LutadoresModel.php");
            
            $id_lutas = isset($_POST['id'])?$_POST['id']:null;
            $ltdM = new LutadoresModel(Model::createConnection());

            $lm = new LutasModel(Model::createConnection());

            $lm->getConnection()->beginTransaction();

            if(!$ltdM->deleteFromLutas($id_lutas)){
                $lm->getConnection()->rollBack();
                die("Erro na exclusão da luta");
            }

            if(!$lm->delete($id_lutas)){
                $lm->getConnection()->rollBack();
                die("Erro na exclusão da luta");
            }

            $lm->getConnection()->commit();
            echo("OK");
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
        public function listByCategoriaAndCompeticao(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/LutasModel.php");
            require_once("./JudoSystem/model/LutadoresModel.php");
            require_once('./JudoSystem/model/AtletaModel.php');
            //$ltdM = new LutadoresModel(Model::createConnection());
           
            $lm = new LutasModel(Model::createConnection());
            $lutas = $lm->selectAllByCategoriaAndCompeticao(isset($_GET['comp'])?$_GET['comp']:null,isset($_GET['categoria'])?$_GET['categoria']:null);

            function getNomeOponentes($luta){
                $ltdM = new LutadoresModel(Model::createConnection());
                $am = new AtletaModel(Model::createConnection());
                $atletas = [];
                $lutadores = $ltdM->selectAllByLuta($luta);
                $atletas[] = is_null($lutadores[0]->getAtletaFk())?null:$am->selectById($lutadores[0]->getAtletaFk());
                $atletas[] = is_null($lutadores[1]->getAtletaFk())?null:$am->selectById($lutadores[1]->getAtletaFk());
                
                return $atletas;
            }
                require_once("./JudoSystem/view/listaLutasView.php");
            
        }

        public function listByAtletaId(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/LutasModel.php");
            require_once("./JudoSystem/model/LutadoresModel.php");
            require_once('./JudoSystem/model/AtletaModel.php');
            require_once('./JudoSystem/model/CategoriaModel.php');
            //$ltdM = new LutadoresModel(Model::createConnection());
           
            $lm = new LutasModel(Model::createConnection());
            $lutas = $lm->selectAllByAtletaId(!isset($_GET["id"])?null:$_GET["id"]);
            $cm = new CategoriaModel(Model::createConnection());

            function getNomeOponentes2($luta){
                $ltdM = new LutadoresModel(Model::createConnection());
                $am = new AtletaModel(Model::createConnection());
                $atletas = [];
                $lutadores = $ltdM->selectAllByLuta($luta);
                $atletas[] = is_null($lutadores[0]->getAtletaFk())?null:$am->selectById($lutadores[0]->getAtletaFk());
                $atletas[] = is_null($lutadores[1]->getAtletaFk())?null:$am->selectById($lutadores[1]->getAtletaFk());
                
                return $atletas;
            }
                require_once("./JudoSystem/view/listaLutaOfAtleta.php");
            
        }

    }
?>