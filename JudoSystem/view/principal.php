<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tela inicial</title>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="shortcut icon" href="../../JudoSystem/view/img/logo.png" type="image/x-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../JudoSystem/view/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../../JudoSystem/view/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../JudoSystem/view/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../JudoSystem/view/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../JudoSystem/view/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../JudoSystem/view/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="../../JudoSystem/view/assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="../../JudoSystem/view/css/mainCss.css">
  <!-- =======================================================
  * Template Name: Day
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/day-multipurpose-html-template-for-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    // Load the Visualization API and the corechart package.
    google.charts.load('current', {
      'packages': ['corechart']
    });

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {

      // Create the data table.
      var data = new google.visualization.DataTable();

      data.addColumn('string', 'Classe');
      data.addColumn('number', '');
      data.addColumn({
        role: 'style'
      });
      data.addRows([
        <?php
        foreach ($report as $r) {
        ?>["<?= $r->classe ?>", <?= $r->qtd ?>, "<?= $r->color ?>"],
        <?php
        } ?>

      ]);

      // Set chart options
      var options1 = {
        'title': 'Quantidade de lutas de cada categoria por classe',
        'width': 700,
        'height': 300,
        'legend': {
          position: "center"
        },
        'pieHole': 0.4,
        colors: ["#020527", "#258262", "#CFC70A", "#fa8c18", "#5a3a7c"]
      };

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, options1);
    }
    google.charts.setOnLoadCallback(drawChartGender);

    function drawChartGender() {

      // Create the data table.
      var data = new google.visualization.DataTable();

      data.addColumn('string', 'Genero');
      data.addColumn('number', '');
      data.addColumn({
        role: 'style'
      });

      data.addRows([
        <?php
        foreach ($genderReport as $rg) {
        ?>["<?= $rg->genero ?>", <?= $rg->qtd ?>, "<?= $rg->color ?>"],
        <?php
        } ?>

      ]);

      // Set chart options
      var options2 = {
        'title': 'Relação entre competidores por sexo',
        'width': 700,
        'height': 300,
        'legend': {
          position: "center"
        },
        colors: [ '#CFC70A', '#020527']
      };

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
      chart.draw(data, options2);
    }
    google.charts.setOnLoadCallback(drawChartMedals);

    function drawChartMedals() {

      // Create the data table.
      var data = new google.visualization.DataTable();

      data.addColumn('string', 'Medalha');
      data.addColumn('number', '');
      data.addColumn({
        role: 'style'
      });

      data.addRows([
        <?php
        foreach ($medalhas as $m) {
        ?>["<?= $m->medalha ?>", <?= $m->qtd ?>, "<?= $m->color ?>"],
        <?php
        } ?>

      ]);

      // Set chart options
      var options3 = {
        'title': 'Relação entre medalhas conquistadas',
        'width': 700,
        'height': 300,
        'legend': {
          position: "center"
        },
        'pieHole': 0.4,
        colors: ['#f7e800', '#b9b9b3', '#e79300']

      };

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_div3'));
      chart.draw(data, options3);
    }
    google.charts.setOnLoadCallback(drawChartDefeat);
    function drawChartDefeat() {

      // Create the data table.
      var data = new google.visualization.DataTable();

      data.addColumn('string', 'Status');
      data.addColumn('number', '');
      data.addColumn({
        role: 'style'
      });
      
      data.addRows([
        <?php
        foreach ($array as $a) {
        ?>["<?= $a->resultado ?>", <?= $a->qtd ?>,"red"],
        <?php
        } ?>

      ]);

      // Set chart options
      var options4 = {
        'title': 'Relação entre vitórias e derrotas',
        'width': 700,
        'height': 300,
        'legend': {
          position: "center"
        },

        colors: ['#328359', '#020527']

      };

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_div4'));
      chart.draw(data, options4);
    }
  </script>
</head>

<body>
  <?php
  require_once('./JudoSystem/tools/redirectToErrorLoginView.php');
  ?>
  <!-- ======= Top Bar ======= -->


  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <img id="logoImg" src="../../JudoSystem/view/img/logo.png" alt="">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.php?class=main&method=showMain">JudoPerform</a> </h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Inicio</a></li>
          <li><a class="nav-link scrollto" href="index.php?class=atleta&method=list">Atletas</a></li>
          <li><a class="nav-link scrollto" href="index.php?class=competicao&method=list">Competições</a></li>
          <li><a class="nav-link scrollto" href="index.php?class=academia&method=showUpdate">Academia</a></li>
          <li><a class="nav-link scrollto " href="index.php?class=main&method=logout">Sair</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>

  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="500">
      <h1>JudoPerform</h1>
      <h2>Uma solução para além do tatame</h2>
      <a href="#Competições" class="btn-get-started scrollto">Descer</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Competições Section ======= -->
    <section id="Competições" class="services">
      <div class="container">

        <div class="section-title">
          <span>Competições</span>
          <h2>Competições</h2>
          <p>Competições mais próximas</p>
        </div>

        <div class="row">
          <?php
          $timeToShow = ["", "data-aos-delay='150'", "data-aos-delay='300'", "data-aos-delay='450'", "data-aos-delay='600'", "data-aos-delay='750'"];
          $icons = ['bx bxl-dribbble', 'bx bx-file', 'bx bx-tachometer', 'bx bx-world', 'bx bx-slideshow', 'bx bx-arch'];

          for ($i = 0; $i < sizeof($competicoes); $i++) {
          ?>
            <div class="col-lg-4 col-md-6 d-flex align-items-center" data-aos="fade-up" <?= $timeToShow[$i] ?>>
              <div class="icon-box" class='compContainers'>
                <div class="icon"><i class="<?= $icons[$i] ?>"></i></div>
                <h4><a href="index.php?class=competicao&method=seeMore&id=<?= $competicoes[$i]->getId_competicao() ?>"><?php echo $competicoes[$i]->getNome(); ?></a></h4>
                <p>Data: <?= $competicoes[$i]->getData_competicao() ?> </p>
              </div>
            </div>
          <?php

          }
          ?>
        </div>

      </div>
    </section><!-- End Competições Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>Ranking de desempenho de atletas</h3>
          <p>Ver ranking de desempenho de atletas</p>
          <a class="cta-btn" href="index.php?class=reports&method=showRankingAtletasMedalhas">VER</a>
        </div>

      </div>
    </section><!-- End Cta Section -->


    <section id="report">
      <div id="principalChartDiv">
        <div class="containerchart">

          <div id="chart_div"></div>
          <div id="chart_div2"></div>
        </div>
        <div class="containerchart">

          <div id="chart_div3"></div>
          <div id="chart_div4"></div>
        </div>
      </div>

    </section>


    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title">
          <span>Equipe</span>
          <h2>Equipe</h2>
          <p>Responsaveis pelo desenvolvimento do sistema</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
            <div class="member">
              <img src="../../JudoSystem/view/img/Salim2.png" alt="">
              <h4>Salim Lopes</h4>
              <span>Concluinte</span>
              <!-- <p>
                
              </p>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div> -->
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
            <div class="member">
              <img src="../../JudoSystem/view/img/Marcelo2.png" alt="">
              <h4>Marcelo Silva</h4>
              <span>Orientador do projeto</span>
              <!-- <p>
                Repellat fugiat adipisci nemo illum nesciunt voluptas repellendus. In architecto rerum rerum temporibus
              </p>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div> -->
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
            <div class="member">
              <img src="../../JudoSystem/view/img/eu2.png" alt="">
              <h4>Rogerio Palafoz</h4>
              <span>Conclinte</span>
              <!-- <p>
                Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des clara
              </p>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div> -->
            </div>
          </div>

        </div>

      </div>

    </section><!-- End Team Section -->



  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">


    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Day</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/day-multipurpose-html-template-for-free/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="../../JudoSystem/view/assets/vendor/aos/aos.js"></script>
  <script src="../../JudoSystem/view/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../JudoSystem/view/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../JudoSystem/view/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../../JudoSystem/view/assets/vendor/swiper/swiper-bundle.min.js"></script>


  <!-- Template Main JS File -->
  <script src="../../JudoSystem/view/assets/js/main.js"></script>

</body>

</html>