<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Adionar nova luta</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="../../JudoSystem/view/css/listaAtletas.css">
  <link href="../../JudoSystem/view/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../../JudoSystem/view/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../JudoSystem/view/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../JudoSystem/view/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../JudoSystem/view/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../JudoSystem/view/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../JudoSystem/view/css/lutas.css">

  <!-- Template Main CSS File -->
  <link href="../../JudoSystem/view/assets/css/style.css" rel="stylesheet">
  

  <!-- =======================================================
  * Template Name: Day
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/day-multipurpose-html-template-for-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>
<?php require_once('./JudoSystem/view/header.php')?>
    <div id="principal">
    
            <form>
            <div class="section-title">
                <span>Adicionar luta</span>
                <h2>Adicionar luta</h2>
        
            </div>
            <input type="hidden" id="categoria" value="<?=isset($_GET['id'])?$_GET['id']:null?>">
            <div class="mb-3">
                <input type="text" class="form-control" id="search" placeholder="Pesquisar atleta" oninput="getAtleta(<?=$_GET['id']?>)">
            </div>
            <select id="atletas" class="form-select" multiple aria-label="multiple select example" onchange="setInputValue()">
               <?php
                foreach($atletas as $at){ ?>
                <option value="<?=$at->getId()?>"><?=$at->getNome()?></option>
                <?php }?>
            </select>
                <div class="form-group">
                    <label for="tempo">Tempo</label>
                    <input type="text" class="form-control" id="tempo" onclick="validaTempo()">
                </div>

               

                <div class="form-group">
                    <label for="goldenScore">Golden Score</label>
                    <input type="text" class="form-control" id="goldenScore">
                </div>
                
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="vitoria" onclick="constraintCheckbx()">
                    <label class="form-check-label" for="vitoria">Vitoria</label>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="hansokumake" onclick="constraintCheckbx()">
                    <label class="form-check-label" for="hansokumake">Desqualificado</label>
                </div>

                <button type="button" class="btn btn-primary" onclick="insert()">Cadastrar</button>
                
            </form>
        
    </div>
    <script src="../../JudoSystem/view/js/lutasAjax.js"></script>
</body>
</html>