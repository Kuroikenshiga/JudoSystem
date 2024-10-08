<?php
  require_once('./JudoSystem/tools/redirectToErrorLoginView.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Adionar nova luta</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="shortcut icon" href="../../JudoSystem/view/img/logo.png" type="image/x-icon">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <!-- <link rel="stylesheet" href="../../JudoSystem/view/css/listaAtletas.css"> -->
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
    <?php require_once('./JudoSystem/view/header.php') ?>
    <div id="principal">

        <form id="luta">
        <div id="lutadoresText" class="section-title">
            <span>Inserir informações da luta</span>
            <h2>Inserir informações da luta</h2>

        </div>
            <input type="hidden" id="categoria" value="<?= isset($_GET['id']) ? $_GET['id'] : null ?>">

            <div class="form-group">
                <label for="tempo">Tempo</label>
                <input type="text" class="form-control" id="tempo" onclick="validaTempo()">
            </div>



            <div class="form-group">
                <label for="goldenScore">Golden Score</label>
                <input type="text" class="form-control" id="goldenScore">
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="Hansokumake">
                <label class="form-check-label" for="Hansokumake">Desqualificação</label>
            </div>



           

        </form>
        
        <div id="lutadores">

            <form>
                <div class="mb-3">
                    <input type="text" class="form-control" id="search" placeholder="Pesquisar atleta" oninput="getAtleta(<?= $_GET['id'] ?>,<?= $_GET['comp'] ?>,this)">
                </div>
                <div class="mb-3">
                    <label for="atletas">Selecione o atleta</label>
                    <select id="atletas" class="form-select" multiple aria-label="multiple select example" onchange="setInputValue(1)">
                        <?php
                        foreach ($atletas as $at) { ?>
                            <option value="<?= $at->getId() ?>"><?= $at->getNome() ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="wazari1">Golpe 1° Wazari</label>
                    
                    <select id="wazari1" class="form-select" aria-label="Selecione o  1° wazari">
                        <option value="">Selecione o golpe</option>
                        <?php
                        foreach ($golpes as $g) { ?>
                            <option value="<?= $g->golpe ?>"><?= $g->golpe ?></option>
                        <?php } ?>
                    </select>

                </div>

                <div class="form-group">
                    <label for="wazari2">Golpe 2° Wazari</label>
                    
                    <select id="wazari2" class="form-select" aria-label="Selecione o  2° wazari">
                    <option value="">Selecione o golpe</option>
                        <?php
                        foreach ($golpes as $g) { ?>
                            <option value="<?= $g->golpe ?>"><?= $g->golpe ?></option>
                        <?php } ?>
                    </select>

                </div>
                <div class="form-group">
                    <label for="ippon">Golpe Ippon</label>
                    <select id="ippon" class="form-select" aria-label="Selecione o golpe ippon">
                    <option value="">Selecione o golpe</option>
                        <?php
                        foreach ($golpes as $g) { ?>
                            <option value="<?= $g->golpe ?>"><?= $g->golpe ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ne-waza">Técnica de solo</label>
                    
                    <select id="ne-waza" class="form-select" aria-label="Selecione a técnica ne-waza">
                    <option value="">Selecione o golpe</option>
                        <?php
                        foreach ($golpesSolo as $g) { ?>
                            <option value="<?= $g->golpe ?>"><?= $g->golpe ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tecnica">Avaliação da técnica(0 a 10)</label>
                    <input type="number" class="form-control" id="tecnica" aria-describedby="Tecnica" placeholder="Técnica">

                </div>

                <div class="form-group">
                    <label for="forca">Avaliação da força(0 a 10)</label>
                    <input type="number" class="form-control" id="forca" aria-describedby="forca" placeholder="Força">

                </div>

                <div class="form-group">
                    <label for="condFisico">Avaliação do condicionamento físico(0 a 10)</label>
                    <input type="number" class="form-control" id="condFisico" aria-describedby="condFisico" placeholder="Condicionamento físico">

                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="vencedor">
                    <label class="form-check-label" for="vencedor">Vencedor</label>
                </div>

                <div class="form-group">
                    <label for="faltas">Quantidade de faltas</label>
                    <input type="number" class="form-control" id="faltas" aria-describedby="faltas" placeholder="Quantidade de faltas">

                </div>
                <!-- <button type="submit" class="btn btn-primary">Enviar</button> -->
            </form>
            <form>
                <div class="mb-3">
                    <input type="text" class="form-control" id="search_2" placeholder="Pesquisar atleta" oninput="getAtleta(<?= $_GET['id'] ?>,<?= $_GET['comp'] ?>,this)">
                </div>
                <div class="mb-3">
                    <label for="atletas">Selecione o atleta</label>
                    <select id="atletas_2" class="form-select" multiple aria-label="multiple select example" onchange="setInputValue(2)">
                        <?php
                        foreach ($atletas as $at) { ?>
                            <option value="<?= $at->getId() ?>"><?= $at->getNome() ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="wazari1_2">Golpe 1° Wazari</label>
                    <select id="wazari1_2" class="form-select" aria-label="Selecione o 1° wazari">
                    <option value="">Selecione o golpe</option>
                        <?php
                        foreach ($golpes as $g) { ?>
                            <option value="<?= $g->golpe ?>"><?= $g->golpe ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="wazari2_2">Golpe 2° Wazari</label>
                    <select id="wazari2_2" class="form-select" aria-label="Selecione o 2° wazari">
                    <option value="">Selecione o golpe</option>
                        <?php
                        foreach ($golpes as $g) { ?>
                            <option value="<?= $g->golpe ?>"><?= $g->golpe ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ippon_2">Golpe Ippon</label>
                    <select id="ippon_2" class="form-select" aria-label="Selecione o golpe ippon">
                    <option value="">Selecione o golpe</option>
                        <?php
                        foreach ($golpes as $g) { ?>
                            <option value="<?= $g->golpe ?>"><?= $g->golpe ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ne-waza_2">Técnica de solo</label>
                    <select id="ne-waza_2" class="form-select" aria-label="Selecione a técnica ne-waza">
                    <option value="">Selecione o golpe</option>
                        <?php
                        foreach ($golpesSolo as $g) { ?>
                            <option value="<?= $g->golpe ?>"><?= $g->golpe ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="Tecnica">Avaliação da técnica(0 a 10)</label>
                    <input type="number" class="form-control" id="tecnica_2" aria-describedby="Tecnica" placeholder="Técnica">

                </div>

                <div class="form-group">
                    <label for="forca">Avaliação da força(0 a 10)</label>
                    <input type="number" class="form-control" id="forca_2" aria-describedby="forca" placeholder="Força">

                </div>

                <div class="form-group">
                    <label for="condFisico">Avaliação do condicionamento físico(0 a 10)</label>
                    <input type="number" class="form-control" id="condFisico_2" aria-describedby="condFisico" placeholder="Condicionamento físico">

                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="vencedor_2">
                    <label class="form-check-label" for="vencedor_2">Vencedor</label>
                </div>

                <div class="form-group">
                    <label for="faltas_2">Quantidade de faltas</label>
                    <input type="number" class="form-control" id="faltas_2" aria-describedby="faltas" placeholder="Quantidade de faltas">

                </div>
                <!-- <button type="submit" class="btn btn-primary">Enviar</button> -->

            </form>


        </div>
      
        <button type="button" class="btn btn-primary" id="btCad" onclick="insertLuta()">Cadastrar</button>
    </div>
    <?php require_once('./JudoSystem/view/footer.php') ?>
    <script src="../../JudoSystem/view/js/lutasAjax.js"></script>
</body>

</html>