
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  
    <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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

</head>
<body>
<?php require_once('./JudoSystem/view/header.php')?>
<section id="Competições" class="services">
      <div class="container">

        <div class="section-title">
          <span>Competições</span>
          <h2>Competições</h2>
          
        </div>
          
        <div class="row">
          <?php
            $timeToShow = ["","data-aos-delay='150'","data-aos-delay='300'","data-aos-delay='450'","data-aos-delay='600'","data-aos-delay='750'"];
            $icons = ['bx bxl-dribbble','bx bx-file','bx bx-tachometer','bx bx-world','bx bx-slideshow','bx bx-arch'];
            for($i = 0; $i < sizeof($competicoes);$i++){
          ?>
            <div class="col-lg-4 col-md-6 d-flex align-items-center" data-aos-delay='450' >
            <div class="icon-box" class='compContainers'>
              <div class="icon"><i class="<?=$icons[sizeof($competicoes) - 1 == $i?4:$i]?>"></i></div>
              <h4><a href="index.php?class=competicao&method=seeMore&id=<?=$competicoes[$i]->getId_competicao()?>"><?php echo $competicoes[$i]->getNome();?></a></h4>
              <p>Data: <?=$competicoes[$i]->getData_competicao()?> </p>
            </div>
          </div>
          <?php
          
            }
          ?>
        </div>

      </div>
    </section><!-- End Competições Section -->

<script src="../../JudoSystem/view/assets/vendor/aos/aos.js"></script>
  <script src="../../JudoSystem/view/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../JudoSystem/view/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../JudoSystem/view/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../../JudoSystem/view/assets/vendor/swiper/swiper-bundle.min.js"></script>
</body>
</html>