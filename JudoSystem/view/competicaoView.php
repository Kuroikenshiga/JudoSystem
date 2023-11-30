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
  <link rel="stylesheet" href="../../JudoSystem//view/css/competicao.css">
  
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
          <h3>Inscrever atleta em <?=$competicoes->getNome()?></h3>
          
          <a class="cta-btn" href="index.php?class=inscricao&method=showCadastro&id=<?=$competicoes->getId_competicao()?>">Inscrever atleta</a>
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
        <?php foreach($inscricoesDistintas as $insD){ 
            //echo json_encode($inscricoesDistintas);
            $inscricaoFiltrd = getInscricoesFiltred($inscricoes,$insD);
            
            $categoria = getCategoriasFiltred($categorias,$inscricaoFiltrd[0]->getCategoria_fk());
            
          ?>
        <div class="categorias">
          <div id="esq">
            <h3> <?=$categoria->getIdCategoria() ?> <?=$categoria->getClasse() ?> <?=$categoria->getGenero() ?> <?=$categoria->getPeso() ?> </h3>
          </div>
          <div id="dir">
            <a id='cad' href="index.php?class=lutas&method=showCadastro&id=<?=$categoria->getIdCategoria()?>&comp=<?=$_GET['id']?>"><button  type="button" class="btn btn-secondary">Cadastrar uma luta</button></a>
            <a href="index.php?class=lutas&method=listByCategoriaAndCompeticao&comp=<?=isset($_GET['id'])?$_GET['id']:null?>&categoria=<?=$categoria->getIdCategoria()?>"><button type="button" class="btn btn-success" id="showLutas">Ver lutas</button></a>
            </div>
          </div>
        <table class="table table-striped">
            <thead>
                <tr>
                
                    <th>Id da inscrição</th>
                    <th>Nome do atleta</th>
                    <th>Data da inscrição</th>
                    <th>Hora da inscrição</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach($inscricaoFiltrd as $ins){?>
                    <tr id="<?=$ins->getId_inscricao()?>">
                        <td><?=$ins->getId_inscricao()?></td>
                        <td><?=searchAtletaInList($atletas,$ins->getAtleta_fk())?></td>
                        <td><?=Date('d-m-Y',strtotime($ins->getData_inscricao()))?></td>
                        <td><?=explode('.',$ins->getHora_inscricao())[0]?></td>
                        <td><a href="index.php?class=inscricao&method=showUpdate&id=<?=!isset($_GET['id'])?null:$_GET['id']?>&id_inscricao=<?=$ins->getId_inscricao()?>"><button class="btn btn-info">Modificar</button></a></td>
                        <td><button class="btn btn-danger" onclick="deletar('<?=$ins->getId_inscricao()?>')">Deletar</button></td>
                        
                    </tr>
                <?php
            }?>
            </tbody>
        </table>
        <?php }?>
      </div>
    </section><!-- End Featured Services Section -->
    <script src="../../JudoSystem/view/assets/vendor/aos/aos.js"></script>
  <script src="../../JudoSystem/view/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../JudoSystem/view/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../JudoSystem/view/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../../JudoSystem/view/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../../JudoSystem/view/assets/js/main.js"></script>
  <script src="../../JudoSystem/view/js/inscricaoAjax.js"></script>
</body>
</html>