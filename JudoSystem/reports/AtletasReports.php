<?php
    class AtletaReports{
        private $connection;

        public function __construct($connection)
        {
            $this->connection = $connection;
        }

        public function selectAllAtletasByAmountMedalhas(){
            $stmt = $this->connection->prepare('select atleta.*,count(*) as qtd from atleta inner join podio on lugar_1 = id_atleta or lugar_2 = id_atleta or lugar_3 = id_atleta or lugar_3_2 = id_atleta
            group by id_atleta order by qtd desc');

            $array = [];

            try{
                $stmt->execute();
                while($row = $stmt->fetch()){
                    $std = new stdClass();
                    $std->nome = $row['nome'];
                    $std->faixa = $row['faixa'];
                    $std->genero = $row['genero'];
                    $std->qtd = $row['qtd'];
                }
            }catch(Exception $e){
                return false;
            }
            return $array;
        }
    }

?>