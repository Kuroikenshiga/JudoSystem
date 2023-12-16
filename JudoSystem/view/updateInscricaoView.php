<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../../JudoSystem/view/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../JudoSystem/view/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../JudoSystem/view/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../JudoSystem/view/css/inscricao.css">
</head>
<body>

<?php require_once('./JudoSystem/view/header.php')?>
    <div id="principal">
        <form>
            <div class="section-title">
                <span>Atualizar inscrição</span>
                <h2>Atualizar inscrição </h2>
        
            </div>
            <input type="hidden" id="competicao" value="<?=$_GET['id']?>">
            <div class="mb-3">
                <input type="text" value="<?=getAtleta($inscricao->getAtleta_fk(),$atletas)->getNome()?>" class="form-control" id="search" placeholder="Pesquisar atleta" oninput="getAtleta()">
            </div>
            <select id="atletas" class="form-select" multiple aria-label="multiple select example" onchange="changeSearchValue()">
               <?php foreach($atletas as $a){ ?>
                <option value="<?=$a->getId()?>" <?=$a->getId() == $inscricao->getAtleta_fk()?'selected':''?> ><?=$a->getNome()?></option>
                <?php }?>
            </select>
            <select class="form-select" aria-label="Default select example" id="classe"  onchange="getClassPeso()">
                <option value="" selected>Selecione a classe do atleta</option>
                <?php
                    foreach($classes as $c){
                ?>
                <option value="<?=$c?>" <?=$categoria->getClasse() == $c?'selected':''?>><?=$c?></option>
            <?php
            }?>
            </select>
            
            <select class="form-select" aria-label="Default select example" id="genero"  onchange="getClassPeso()" >
                <option value="" selected>Selecione o genero do atleta</option>
                <option value="Masculino" <?=$categoria->getGenero() == 'Masculino'?'selected':''?> >Masculino</option>
                <option value="Feminino" <?=$categoria->getGenero() == 'Feminino'?'selected':''?> >Feminino</option>
            </select>
            <select class="form-select" aria-label="Default select example" id="peso" ">
                <option selected>Escolha o peso do atleta</option>
                <?php foreach($pesos as $p){ ?>
                <option value="<?=$p?>" <?=$categoria->getPeso() == $p?'selected':''?>><?=$p?></option>
                <?php }?>
            </select>
            <input type="hidden" id="id" value="<?=!isset($_GET['id_inscricao'])?null:$_GET['id_inscricao']?>">
            <input type="hidden" id="idComp" value="<?=!isset($_GET['id'])?null:$_GET['id']?>">
                <button type="button" class="btn btn-primary" onclick="update()">modificar</button>
        </form>
    </div>
    <?php require_once('./JudoSystem/view/footer.php') ?>
    <script src="../../JudoSystem/view/js/inscricaoAjax.js"></script>
</body>
</html>