<?php
    class AtletaReports{
        private $connection;

        public function __construct($connection)
        {
            $this->connection = $connection;
        }

        public function selectAllAtletasByAmountMedalhas(){
            $stmt = $this->connection->prepare('select nome,faixa,genero,count(id_podio) as qtd from atleta left join podio
            on lugar_1 = id_atleta or lugar_2 = id_atleta or lugar_3 = id_atleta or lugar_3_2 = id_atleta 
            group by id_atleta order by qtd desc ');

            $array = [];

            try{
                $stmt->execute();
                while($row = $stmt->fetch()){
                    $std = new stdClass();
                    $std->nome = $row['nome'];
                    $std->faixa = $row['faixa'];
                    $std->genero = $row['genero'];
                    $std->qtd = $row['qtd'];
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