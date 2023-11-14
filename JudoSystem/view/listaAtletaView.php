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
<script src="../../JudoSystem/view/js/listaAtletas.js"></script>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      
      <div class="social-links d-none d-md-block">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">Day</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Inicio</a></li>
          <li><a class="nav-link scrollto" href="index.php?class=atleta&method=list">Atletas</a></li>
          <li><a class="nav-link scrollto" href="#services">Competições</a></li>
          <li><a class="nav-link scrollto" href="index.php?class=academia&method=showUpdate">Academia</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contato</a></li>
          <li><a class="nav-link scrollto " href="index.php?class=main&method=logout">Sair</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
    <div id="principal">
        <div id="slideBar">
            <a href="../../index.php?class=atleta&method=showCadastro"><button type="button"  class="btn btn-success">Cadastrar atletas</button></a>
       </div>
        <div id="showSlideBar" onclick="showSlideBar()">

        </div>
      
        <table class="table table-striped">
            <thead>
                <tr>
               
                    <th>Nome</th>
                    <th>Faixa</th>
                    <th>Gênero</th>
                    <th>Data de nascimento</th>
                    <th>Pontuação</th>
                </tr>
            <tbody id="bodyTable">
                <?php
                    foreach($atleta as $i){
                ?>
                    <tr>
                        <td><?php echo $i->getNome() ?></td>
                        <td><?php echo $i->getFaixa() ?></td>
                        <td><?php echo $i->getGenero() ?></td>
                        <td><?php echo $i->getData_Nascimento() ?></td>
                        <td><?php echo $i->getPontuacao() ?></td>
                        <td><a href="index.php?class=Atleta&method=ShowUpdate&id_atleta=<?php echo $i->getId() ?>"><button type="button" class="btn btn-info">Modificar</button></a></td>
                        <td><button class="btn btn-danger" onclick="remove(<?php echo $i->getId() ?>)">Deletar</button></td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
            </thead>
            
        </table>
    </div>
    <script src="../../JudoSystem/view/js/atletaAjax.js"></script>
</body>
</html>