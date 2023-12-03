<?php
    function gerator($string,$class){
        $array = explode(' ',$string);
        
        echo 'class '.$class.'{<br>';

        foreach($array as $item){
            echo 'private $'.$item.';<br>';
        }
        $char = '$';
		echo '<br>';
        foreach($array as $item){
            echo 'public function get'.ucfirst($item).'(){<br> return '.$char.'this->'.$item.';<br>}<br>public function set'.ucfirst($item).'($'.$item.'){<br>'.$char.'this->'.$item.' = $'.$item.';<br>}<br><br>';
        }
        echo '}';
    }
    gerator('idPodio lugar1 lugar2 lugar3 lugar3_2 pontuacao1 pontuacao2 pontuacao3 pontuacao3_2 competicaoFk categoriaFk','Podio');
?>