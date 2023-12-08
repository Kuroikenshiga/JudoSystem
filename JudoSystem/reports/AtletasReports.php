<?php
    class AtletaReports{
        private $connection;

        public function __construct($connection)
        {
            $this->connection = $connection;
        }

        public function selectAllAtletasByAmountMedalhas(){
            $stmt = $this->connection->prepare('select nome,faixa,genero,count(lugar_1) as qtdOuro, count(lugar_2) as qtdPrata, count(lugar_3) as qtdBronze, count(lugar_3_2) as qtdB from atleta left join podio
            on lugar_1 = id_atleta or lugar_2 = id_atleta or lugar_3 = id_atleta or lugar_3_2 = id_atleta 
            group by id_atleta order by qtdouro desc');

            $array = [];

            try{
                $stmt->execute();
                while($row = $stmt->fetch()){
                    $std = new stdClass();
                    $std->nome = $row['nome'];
                    $std->faixa = $row['faixa'];
                    $std->genero = $row['genero'];
                    $std->qtdOuro = $row['qtdouro'];
                    $std->qtdPrata = $row['qtdprata'];
                    $std->qtdBronze = $row['qtdbronze'] + $row['qtdb'];
                    $array[] = $std;
                }
            }catch(Exception $e){
                echo $e->getMessage();
                return false;
            }
            return $array;
        }
        public function selectAllFiltredByPerfomances($p){
            if($p == 'f'){
                $p = 'forca';   
            }
            else if($p == 't'){
                $p = 'tecnica';   
            }
            else{
                $p = 'condicionamento_fisico';
            }
            $array = [];
            try{
            $stmt = $this->connection->prepare('select nome, faixa,genero, round(avg( '.$p.' ),1) as '.$p.' from atleta left join lutadores on atleta_fk = id_atleta
            group by id_atleta order by '.$p.' desc');

            
           

            
                $stmt->execute();
                while($row = $stmt->fetch()){
                    $std = new stdClass();
                    $std->nome = $row['nome'];
                    $std->faixa = $row['faixa'];
                    $std->genero = $row['genero'];
                    $std->metrica = $row[$p];
                    
                    $array[] = $std;
                }
            }catch(Exception $e){
                echo $e->getMessage();
                return false;
            }
            return $array;
        }
        public function selectByIdPerformanceAtleta($id){{
            $stmt = $this->connection->prepare('select nome, avg(tecnica) as tecnica, avg(forca) as forca,avg(condicionamento_fisico) as condicionamento_fisico from atleta left join lutadores on atleta_fk = id_atleta where id_atleta = ?
            group by(id_atleta)');
            $std = new stdClass();
            try{
                
                $stmt->bindValue(1,$id);

                $stmt->execute();
                $row = $stmt->fetch();
                $std->nome = $row['nome'];
                $std->t = $row['tecnica'];
                $std->f = $row['forca'];
                $std->c = $row['condicionamento_fisico'];
            }
            catch(Exception $e){
                return false;
            }
            return $std;
        }}
    }

?>