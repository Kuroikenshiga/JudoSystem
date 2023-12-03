<?php
   require_once("./JudoSystem/model/Model.php");
   require_once("./JudoSystem/model/PodioModel.php");
   require_once('./JudoSystem/valueObject/Podio.php');
    class PodioController{
        
        public function showInsertOrUpdate(){
            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/PodioModel.php");

            require_once("./JudoSystem/model/Model.php");
            require_once("./JudoSystem/model/AtletaModel.php");
            $am = new AtletaModel(Model::createConnection());
            $atletas = $am->selectAtletaByCategoriaAndCompeticao(isset($_GET['categoria'])?$_GET['categoria']:null,isset($_GET['competicao'])?$_GET['competicao']:null);

            $pm = new PodioModel(Model::createConnection());
            $podio = $pm->selectByCompeticaoAndCategoria(isset($_GET['competicao'])?$_GET['competicao']:null,isset($_GET['categoria'])?$_GET['categoria']:null);

            if(is_null($podio)){
                require_once("./JudoSystem/view/cadastraPodio.php");
                return ;
            }
            if(!$podio){
                die('Erro na consulta');
            }
            function findAtletaNome($array,$id){
                if(is_null($id)){
                    return "Atleta externo";
                }
                foreach($array as $a){
                    if($a->getId() == $id){
                        return $a->getNome();
                    }
                }
                return "Atleta externo";
            }
            require_once("./JudoSystem/view/UpdatePodioView.php");
        }



        public function insert(){
            $json = json_decode(file_get_contents("php://input"));
            $podio = new Podio(null,$json->l1,$json->l2,$json->l3,$json->l3_2,$json->p1,$json->p2,$json->p3,$json->p3_2,$json->competicao,$json->categoria);
            $pm = new PodioModel(Model::createConnection());

            if(!$pm->insert($podio)){
                die('Erro de inserção');
            }

            echo "OK";

        }
        public function update(){
            $json = json_decode(file_get_contents("php://input"));
            $podio = new Podio(null,$json->l1,$json->l2,$json->l3,$json->l3_2,$json->p1,$json->p2,$json->p3,$json->p3_2,$json->competicao,$json->categoria);
            $pm = new PodioModel(Model::createConnection());

            if(!$pm->updateByCompeticaoAndCategoria($podio)){
                die('Erro de Atualização');
            }

            echo "OK";

        }

    }
?>