<?php
  require_once('./JudoSystem/tools/redirectToErrorLoginView.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Informações da luta</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
        <div id="alert">

        </div>
        <form id="luta">
        <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="AllowUpdate" onclick="allowUpdate(this)">
                        <label class=" form-check-label" for="vencedor_2">Modificar informações</label>
                </div>
            <div class="section-title">
                <span>Informações da luta</span>
                <h2>Informações da luta</h2>

            </div>
            <input type="hidden" id="comp" value="<?=isset($_GET['comp'])?$_GET['comp']:null?>">
            <input type="hidden" id="lutaId" value="<?=isset($_GET['id_lutas'])?$_GET['id_lutas']:null?>">
            <input type="hidden" id="categoria" value="<?= isset($_GET['categoria']) ? $_GET['categoria'] : null ?>">

            <div class="form-group">
                <label for="tempo">Tempo</label>
                <input type="text" class="form-control control"  id="tempo" value="<?= $luta->getTempo() ?>" disabled>
            </div>



            <div class="form-group">
                <label for="goldenScore">Golden Score</label>
                <input type="text" class="form-control control" id="goldenScore" value="<?= $luta->getGoldenScore() ?>" disabled>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input control" id="Hansokumake" <?= $luta->getHansokuMake() ? 'checked' : '' ?> disabled>
                <label class="form-check-label" for="Hansokumake">Desqualificação</label>
            </div>



         

        </form>
        
        <div id="lutadores">

            <form>
                <input type="hidden" id="idOponente1" value="<?=$lutadores[0]->getIdLutadores()?>">
                <div class="mb-3">
                    <input type="text" class="form-control control" id="search" disabled value="<?= getAtletaNome($lutadores[0]->getAtletaFk(), $atletas) ?>" placeholder="Pesquisar atleta" oninput="getAtleta(<?= $_GET['categoria'] ?>,<?= $_GET['comp'] ?>)">
                </div>
                <div class="mb-3">
                    <label for="atletas">Selecione o atleta</label>
                    <select id="atletas" class="form-select control" multiple aria-label="multiple select example" onchange="setInputValue(1)" disabled>
                        <?php
                        foreach ($atletas as $at) { ?>
                            <option value="<?= $at->getId() ?>" <?= $lutadores[0]->getAtletaFk() == $at->getId() ? 'selected' : '' ?>><?= $at->getNome() ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    
                    <label for="wazari1">Golpe 1° Wazari</label>
                    
                    <select id="wazari1" class="form-select control" aria-label="Selecione o golpe do 1° wazari" disabled>
                        <option value="">Selecione o golpe</option>
                        <?php
                        foreach ($golpes as $g) { ?>
                            <option <?php echo $lutadores[0]->getWazari1() == $g->golpe?"selected":""?> value="<?= $g->golpe ?>"><?= $g->golpe ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="wazari2">Golpe 2° Wazari</label>

                    <select id="wazari2" class="form-select control" aria-label="Selecione o golpe do 2° wazari" disabled>
                        <option value="">Selecione o golpe</option>
                        <?php
                        foreach ($golpes as $g) { ?>
                            <option <?php echo $lutadores[0]->getWazari2() == $g->golpe?"selected":""?> value="<?= $g->golpe ?>"><?= $g->golpe ?></option>
                        <?php } ?>
                    </select>

                </div>
                <div class="form-group">
                    <label for="ippon">Golpe Ippon</label>

                    <select id="ippon" class="form-select control" aria-label="Selecione o golpe ippon" disabled>
                        <option value="">Selecione o golpe</option>
                        <?php
                        foreach ($golpes as $g) { ?>
                            <option <?php echo $lutadores[0]->getIppon() == $g->golpe?"selected":""?> value="<?= $g->golpe ?>"><?= $g->golpe ?></option>
                        <?php } ?>
                    </select>

                </div>
                <div class="form-group">
                    <label for="ne-waza">Técnica de solo</label>

                    <select id="ne-waza" class="form-select control" aria-label="Selecione a técnica de solo" disabled>
                        <option value="">Selecione o golpe</option>
                        <?php
                        foreach ($golpesSolo as $g) { ?>
                            <option <?php echo $lutadores[0]->getTecnicaNeWaza() == $g->golpe?"selected":""?> value="<?= $g->golpe ?>"><?= $g->golpe ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tecnica">Avaliação da técnica(0 a 10)</label>
                    <input type="number" class="form-control control" id="tecnica" aria-describedby="Técnica" placeholder="Técnica" disabled value="<?= $lutadores[0]->getTecnica() ?>">

                </div>

                <div class="form-group">
                    <label for="forca">Avaliação da força(0 a 10)</label>
                    <input type="number" class="form-control control" id="forca" aria-describedby="forca" placeholder="Força" disabled value="<?= $lutadores[0]->getForca() ?>">

                </div>

                <div class="form-group">
                    <label for="condFisico">Avaliação do condicionamento físico(0 a 10)</label>
                    <input type="number" class="form-control control" id="condFisico" aria-describedby="condFisico" placeholder="Condicionamento físico" disabled value="<?= $lutadores[0]->getCondicionamentoFisico() ?>">

                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input control" id="vencedor" disabled <?= $lutadores[0]->getGanhador() ? 'checked' : '' ?>>
                    <label class="form-check-label control" for="vencedor">Vencedor</label>
                </div>

                <div class="form-group">
                    <label for="faltas">Quantidade de faltas</label>
                    <input type="number" class="form-control control" id="faltas" aria-describedby="faltas" placeholder="Quantidade de faltas" disabled value="<?= $lutadores[0]->getQtdFaltas() ?>">

                </div>
                <!-- <button type="submit" class="btn btn-primary">Enviar</button> -->
            </form>
            <form>
            <input type="hidden" id="idOponente2" value="<?=$lutadores[1]->getIdLutadores()?>">
                <div class="mb-3">
                    <input type="text" class="form-control control" id="search_2" disabled value="<?= getAtletaNome($lutadores[1]->getAtletaFk(), $atletas) ?>" placeholder="Pesquisar atleta" oninput="getAtleta(<?= $_GET['categoria'] ?>,<?= $_GET['comp'] ?>)">
                </div>
                <div class="mb-3">
                    <label for="atletas">Selecione o atleta</label>
                    <select id="atletas_2" class="form-select control" multiple aria-label="multiple select example" disabled onchange="setInputValue(2)">
                        <?php
                        foreach ($atletas as $at) { ?>
                            <option value="<?= $at->getId() ?>" <?= $lutadores[1]->getAtletaFk() == $at->getId() ? 'selected' : '' ?>><?= $at->getNome() ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="wazari1_2">Golpe 1° Wazari</label>

                    <select id="wazari1_2" class="form-select control" aria-label="Selecione o 1° Wazari" disabled>
                        <option value="">Selecione o golpe</option>
                        <?php
                        foreach ($golpes as $g) { ?>
                            <option <?php echo $lutadores[1]->getWazari1() == $g->golpe?"selected":""?> value="<?= $g->golpe ?>"><?= $g->golpe ?></option>
                        <?php } ?>
                    </select>

                </div>

                <div class="form-group">
                    <label for="wazari2_2">Golpe 2° Wazari</label>

                    <select id="wazari2_2" class="form-select control" aria-label="Selecione o 2° Wazari" disabled>
                        <option value="">Selecione o golpe</option>
                        <?php
                        foreach ($golpes as $g) { ?>
                            <option <?php echo $lutadores[1]->getWazari2() == $g->golpe?"selected":""?> value="<?= $g->golpe ?>"><?= $g->golpe ?></option>
                        <?php } ?>
                    </select>

                </div>
                <div class="form-group">
                    <label for="ippon_2">Golpe Ippon</label>

                    <select id="ippon_2" class="form-select control" aria-label="Selecione o ippon" disabled>
                        <option value="">Selecione o golpe</option>
                        <?php
                        foreach ($golpes as $g) { ?>
                            <option <?php echo $lutadores[1]->getIppon() == $g->golpe?"selected":""?> value="<?= $g->golpe ?>"><?= $g->golpe ?></option>
                        <?php } ?>
                    </select>

                </div>
                <div class="form-group">
                    <label for="ne-waza_2">Técnica de solo</label>

                    <select id="ne-waza_2" class="form-select control" aria-label="Selecione o ippon" disabled>
                        <option value="">Selecione a técnica de solo</option>
                        <?php
                        foreach ($golpesSolo as $g) { ?>
                            <option <?php echo $lutadores[1]->getTecnicaNeWaza() == $g->golpe?"selected":""?> value="<?= $g->golpe ?>"><?= $g->golpe ?></option>
                        <?php } ?>
                    </select>

                </div>

                <div class="form-group">
                    <label for="Tecnica">Avaliação da técnica(0 a 10)</label>
                    <input type="number" class="form-control control" id="tecnica_2" aria-describedby="Tecnica" placeholder="Técnica" disabled value="<?= $lutadores[1]->getTecnica() ?>">
                        
                    </div>

                    <div class=" form-group">
                    <label for="forca">Avaliação da força(0 a 10)</label>
                    <input type="number" class="form-control control" id="forca_2" aria-describedby="forca" placeholder="Força" disabled value="<?= $lutadores[1]->getForca() ?>">

                </div>

                <div class="form-group">
                    <label for="condFisico">Avaliação do condicionamento físico(0 a 10)</label>
                    <input type="number" class="form-control control" id="condFisico_2" aria-describedby="condFisico" placeholder="Condicionamento físico" disabled value="<?= $lutadores[1]->getCondicionamentoFisico() ?>">

                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input control" id="vencedor_2" disabled <?=$lutadores[1]->getGanhador() ? 'checked' : '' ?>>
                        <label class=" form-check-label" for="vencedor_2">Vencedor</label>
                </div>

                <div class="form-group">
                    <label for="faltas_2">Quantidade de faltas</label>
                    <input type="number" class="form-control control" id="faltas_2" aria-describedby="faltas" placeholder="Quantidade de faltas" disabled value="<?= $lutadores[1]->getQtdFaltas() ?>">

                </div>
                <!-- <button type="submit" class="btn btn-primary">Enviar</button> -->

            </form>


        </div>
        <!-- <button type="button" class="btn btn-info" id="btBack" onclick="showContent()">Voltar</button> -->
        <button type="button" class="btn btn-primary" id="btUp" onclick="updateLuta()">Salvar modificações</button>
    </div>
    <?php require_once('./JudoSystem/view/footer.php') ?>
    <script src="../../JudoSystem/view/js/lutasAjax.js"></script>
    <script src="../../JudoSystem/view/js/inscricaoAjax.js"></script>
    
</body>

</html>