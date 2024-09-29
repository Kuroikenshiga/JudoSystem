<?php
if(session_status() != PHP_SESSION_ACTIVE){
    session_start();
}
class AtletaReports
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function selectAllAtletasByAmountMedalhas()
    {
        $stmt = $this->connection->prepare('SELECT nome,faixa,genero,COUNT(lugar_1) AS qtdOuro, COUNT(lugar_2) as qtdPrata, COUNT(lugar_3) AS qtdBronze, COUNT(lugar_3_2) AS qtdB FROM atleta left join podio
            on lugar_1 = id_atleta or lugar_2 = id_atleta or lugar_3 = id_atleta or lugar_3_2 = id_atleta 
            WHERE academia_fk = ?
            group by id_atleta order by qtdouro desc');

        $array = [];

        try {
            $stmt->bindValue(1,$_SESSION["idAcademia"]);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                $std = new stdClass();
                $std->nome = $row['nome'];
                $std->faixa = $row['faixa'];
                $std->genero = $row['genero'];
                $std->qtdOuro = $row['qtdouro'];
                $std->qtdPrata = $row['qtdprata'];
                $std->qtdBronze = $row['qtdbronze'] + $row['qtdb'];
                $array[] = $std;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
        return $array;
    }
    public function selectAllFiltredByPerfomances($p)
    {
        if ($p == 'f') {
            $p = 'forca';
        } else if ($p == 't') {
            $p = 'tecnica';
        } else {
            $p = 'condicionamento_fisico';
        }
        $array = [];
        try {
            $stmt = $this->connection->prepare('select nome, faixa,genero, round(avg( ' . $p . ' ),1) as ' . $p . ' from atleta left join lutadores on atleta_fk = id_atleta where academia_fk = ?
            group by id_atleta order by ' . $p . ' desc');
            $stmt->bindValue(1,$_SESSION["idAcademia"]);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                $std = new stdClass();
                $std->nome = $row['nome'];
                $std->faixa = $row['faixa'];
                $std->genero = $row['genero'];
                $std->metrica = $row[$p];

                $array[] = $std;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
        return $array;
    }
    public function selectByIdPerformanceAtleta($id)
    { {
            $stmt = $this->connection->prepare('select nome, avg(tecnica) as tecnica, avg(forca) as forca,avg(condicionamento_fisico) as condicionamento_fisico from atleta left join lutadores on atleta_fk = id_atleta where id_atleta = ?
            group by(id_atleta)');
            $std = new stdClass();
            try {

                $stmt->bindValue(1, $id);

                $stmt->execute();
                $row = $stmt->fetch();
                $std->nome = $row['nome'];
                $std->t = $row['tecnica'];
                $std->f = $row['forca'];
                $std->c = $row['condicionamento_fisico'];
            } catch (Exception $e) {
                return false;
            }
            return $std;
        }
    }
    public function selectReports($id)
    {
        $stmt = $this->connection->prepare("select (select count(*) from atleta inner join lutadores on atleta_fk = id_atleta where ganhador = true and id_atleta = ?) as v,
(select count(*) from atleta inner join lutadores on atleta_fk = id_atleta where ganhador = false and id_atleta = ?) as d,
(select count(*) from atleta inner join lutadores on atleta_fk = id_atleta inner join lutas on id_lutas = luta_fk where ganhador = false and hansoku_make = true and id_atleta = ?) as h");
        $std = new stdClass();
        try {
            $stmt->bindValue(1, $id);
            $stmt->bindValue(2, $id);
            $stmt->bindValue(3, $id);
            $stmt->execute();
            $row = $stmt->fetch();
            $std->v = $row["v"];
            $std->d = $row["d"];
            $std->h = $row["h"];
        } catch (Exception $e) {
            return false;
        }
        return $std;
    }
    public function categoriaReport()
    {
        $colors = array("blue", "green", "yellow", "orange", "purple");
        $index = 0;
        $stmt = $this->connection->prepare("select classe,count(*) as qtd from categoria inner join lutas on id_categoria = categoria_fk inner join lutadores on luta_fk = id_lutas inner join atleta on id_atleta = atleta_fk where academia_fk = ? group by classe");

        $reports = [];
        try {
            $stmt->bindValue(1,$_SESSION["idAcademia"]);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                $std = new stdClass();
                $std->classe = $row["classe"];
                $std->qtd = $row["qtd"];
                $std->color = $colors[$index];
                $index++;
                $reports[] = $std;
            }
        } catch (Exception $e) {
            return false;
        }
        return $reports;
    }
}
