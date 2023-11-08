<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../JudoSystem/view/css/forms.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div id="principal">
        <table>
            <tr>
                <th>Nome</th>
                <th>Faixa</th>
                <th>Gênero</th>
                <th>Data de nascimento</th>
                <th>Pontuação</th>
            </tr>
            <?php
                foreach($atletas as $i){
            ?>
            <tr>
                <td><?php echo $i->getNome() ?></td>
                <td><?php echo $i->getFaixa() ?></td>
                <td><?php echo $i->getGenero() ?></td>
                <td><?php echo $i->getData_Nascimento() ?></td>
                <td><?php echo $i->getPontuacao() ?></td>
                <td><a href="index.php?class=Atleta&method=update&id_atleta=<?php echo $i->getIdAtleta() ?>">Modificar</a></td>
                <td><a href="index.php?class=Atleta&method=delete&id_atleta=<?php echo $i->getIdAtleta() ?>">Remover</a></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>
</body>
</html>