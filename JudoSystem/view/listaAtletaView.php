<?php
require_once('./JudoSystem/tools/redirectToErrorLoginView.php');
?>

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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
  <script src="../../JudoSystem/view/js/listaAtletas.js"></script>

  <?php require_once('./JudoSystem/view/header.php') ?>
  <div id="principal">

    <div class="section-title">
      <span>Atletas cadastrados</span>
      <h2>Atletas cadastrados</h2>

    </div>
    <div id="slideBar">
      <img id="logoImgMenuLateral" src="../../JudoSystem/view/img/logo.png" alt="">
      <a href="../../index.php?class=atleta&method=showCadastro"><button type="button" class="btn btn-success">Cadastrar atletas</button></a>
    </div>
    <div id="showSlideBar" onclick="showSlideBar(this)">
      <a href="#"><span class="material-symbols-outlined">
        density_medium
      </span></a>
    </div>
    <div id="contain">



      <table class="table table-striped">
        <thead>
          <tr>

            <th>Nome</th>
            <th>Faixa</th>
            <th>Gênero</th>
            <th>Data de nascimento</th>
            <th>Pontos no ranking</th>
          </tr>
        </thead>
        <tbody id="bodyTable">
          <?php
          foreach ($atleta as $i) {
          ?>
            <tr>
              <td><?php echo $i->getNome() ?></td>
              <td><?php echo $i->getFaixa() ?></td>
              <td><?php echo $i->getGenero() ?></td>
              <td><?php echo $i->getData_Nascimento() ?></td>
              <td><?php echo $i->getPontuacao() ?></td>
              <td><a href="index.php?class=reports&method=showPerfomanceAtelta&metricas=<?= $i->getId() ?>"><i class="bi bi-eye"></i></a></td>
              <td><a href="index.php?class=Atleta&method=ShowUpdate&id_atleta=<?php echo $i->getId() ?>"><button type="button" class="btn btn-info">Modificar</button></a></td>
              <td><button class="btn btn-danger" onclick="remove(<?php echo $i->getId() ?>)">Deletar</button></td>
            </tr>
          <?php
          }
          ?>
        </tbody>


      </table>
    </div>
  </div>
  <?php require_once('./JudoSystem/view/footer.php') ?>
  <script src="../../JudoSystem/view/js/atletaAjax.js"></script>
</body>

</html>