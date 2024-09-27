<?php
  require_once('./JudoSystem/tools/redirectToErrorLoginView.php');
?>
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
                <span>Inscrever atleta</span>
                <h2>Inscrever atleta</h2>
        
            </div>
            <input type="hidden" id="competicao" value="<?=$_GET['id']?>">
            <div class="mb-3">
                <input type="text" class="form-control" id="search" placeholder="Pesquisar atleta" oninput="getAtleta()">
            </div>
            <select id="atletas" class="form-select" multiple aria-label="multiple select example" onchange="changeSearchValue()">
               
            </select>
            <select class="form-select" aria-label="Default select example" id="classe"  onchange="getClassPeso()">
                <option value="" selected>Selecione a classe do atleta</option>
                <?php
                    foreach($categorias as $c){
                ?>
                <option value="<?=$c?>"><?=$c?></option>
            <?php
            }?>
            </select>
            
            <select class="form-select" aria-label="Default select example" id="genero"  onchange="getClassPeso()" >
                <option value="" selected>Selecione o genero do atleta</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
            </select>
            <select class="form-select" aria-label="Default select example" id="peso" ">
                <option selected>Selecione a classe e o genero do atleta</option>

            </select>
            

                <button type="button" class="btn btn-primary" onclick="insert()">Inscrever atleta</button>
        </form>
    </div>
    <?php require_once('./JudoSystem/view/footer.php') ?>
    <script src="../../JudoSystem/view/js/inscricaoAjax.js"></script>
</body>
</html>