<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Lista de atletas</title>
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
     
        <div class="section-title">
          <span>Lutas cadastradas</span>
          <h2>Lutas cadastradas</h2>
    
        </div>
        
        <div id="contain">
        
         
        
          <table class="table table-striped">
              <thead>
                  <tr>
                    <th>Id</th>
                    <th>1° lutador</th>
                    <th>2° lutador</th>
                    <th>Tempo</th>
                    <th>Desqualificação</th>
                    <th>Golden Score</th>

                  </tr>
                </thead>
              <tbody id="bodyTable">
                  <?php
                   
                    foreach($lutas as $l){
                    $lutadores = getNomeOponentes($l->getIdLutas());    
                  ?>
                      <tr>
                        <td><?=$l->getIdLutas()?></td>
                        <td><?=$lutadores[0] == null?'Atleta externo':$lutadores[0]->getNome()?></td>
                        <td><?=$lutadores[1] == null?'Atleta externo':$lutadores[1]->getNome()?></td>
                        <td><?php echo $l->getTempo() ?></td>
                        <td><?php echo $l->getHansokuMake()?'Sim':'Não' ?></td>
                        <td><?php echo $l->getGoldenScore() ?></td>
                        <td><a href="index.php?class=Lutas&method=showUpdate&id_lutas=<?php echo $l->getIdLutas() ?>&comp=<?=$_GET['comp']?>&categoria=<?=$_GET['categoria']?>"><button type="button" class="btn btn-info">Modificar</button></a></td>
                        <td><button class="btn btn-danger" onclick="remove(<?php echo $l->getIdLutas() ?>)">Deletar</button></td>
                      </tr>
                  <?php
                      }
                  ?>
              </tbody>
              
              
          </table>
        </div>
    </div>
    <script src="../../JudoSystem/view/js/lutasAjax.js"></script>
</body>
</html>