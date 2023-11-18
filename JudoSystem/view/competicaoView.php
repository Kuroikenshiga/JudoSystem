<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../../JudoSystem/view/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../../JudoSystem/view/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../JudoSystem/view/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../JudoSystem/view/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../JudoSystem/view/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../JudoSystem/view/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="../../JudoSystem/view/assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="../../JudoSystem/view/css/mainCss.css">
  
</head>
<body>
    
    <?php require_once('./JudoSystem/view/header.php')?>
    <div class="container" data-aos="zoom-in">



    
      </div>
    <div class="section-title">
          <span><?=$competicoes->getNome()?></span>
          <h2><?=$competicoes->getNome()?></h2>
    
    </div>
    
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>Inscrever atleta</h3>
          <p>Inscrever atleta</p>
          <a class="cta-btn" href="#">Inscrever atleta</a>
        </div>

      </div>
    </section><!-- End Cta Section -->
    <section id="featured-services" class="featured-services">
      <div class="container">

        <div class="row">

            <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="200">
                <div class="service-item position-relative">
                <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
                <h4>Local</h4>
                <p><?=$competicoes->getLogradouro()?>, <?=$competicoes->getCidade()?>, <?=$competicoes->getEstado()?></p>
                </div>
            </div><!-- End Service Item -->

            <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="400">
                <div class="service-item position-relative">
                <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
                <h4>Data da competição</h4>
                <p> <?=date('d-m-Y',strtotime($competicoes->getData_competicao()))?></p>
                </div>
            </div><!-- End Service Item -->

          

        </div>
        <hr>
        <div class="section-title">
          <span>Inscrições</span>
          <h2>Inscrições</h2>
    
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                
                    <th>Id da inscrição</th>
                    <th>Nome do atleta</th>
                    <th>Categoria da inscrição</th>
                    <th>Data da inscrição</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach($inscricoes as $ins){?>
                    <tr>
                        <td><?=$ins->getId_inscricao()?></td>
                        <td><?=searchAtletaInList($atletas,$ins->getAtleta_fk())?></td>

                    </tr>
                <?php
            }?>
            </tbody>
        </table>
      </div>
    </section><!-- End Featured Services Section -->
    <script src="../../JudoSystem/view/assets/vendor/aos/aos.js"></script>
  <script src="../../JudoSystem/view/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../JudoSystem/view/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../JudoSystem/view/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../../JudoSystem/view/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../../JudoSystem/view/assets/js/main.js"></script>
</body>
</html>