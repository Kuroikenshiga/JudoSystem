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
    
            $json = json_decode(file_get_contents("php://input"));
            $id = $json->id;
    
            $atl = new AtletaModel(Model::createConnection());
            if(!$atl->delete($id)){
                die("Erro na exclusão do atleta");
            }
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
            $atletas = $am->selectAtletaByCategoriaAndNome(isset($_POST['id'])?$_POST['id']:null,isset($_POST['nome'])?$_POST['nome']:null);
            
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