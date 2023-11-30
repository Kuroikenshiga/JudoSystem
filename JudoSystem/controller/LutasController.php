<?php
    class LutasController{
        public function showCadastro(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/AtletaModel.php");
            $am = new AtletaModel(Model::createConnection());
            $atletas = $am->selectAtletaByCategoria(isset($_GET['id'])?$_GET['id']:null);
            
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
        public function listByCategoriaAndCompeticao(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/LutasModel.php");

            $lutasm = new LutasModel(Model::createConnection());
            $lutas = $lutasm->selectAllByCategoriaAndCompeticao(isset($_GET['comp'])?$_GET['comp']:null,isset($_GET['categoria'])?$_GET['categoria']:null);

            
                require_once("./JudoSystem/view/listaLutasView.php");
            
        }
    }
?>