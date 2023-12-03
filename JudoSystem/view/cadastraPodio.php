<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de pódio</title>

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
    <link rel="stylesheet" href="../../JudoSystem/view/css/podio.css">

    <!-- Template Main CSS File -->
    <link href="../../JudoSystem/view/assets/css/style.css" rel="stylesheet">

</head>

<body>
    <?php require_once('./JudoSystem/view/header.php') ?>
    <div id="containner">
        <div id="principal">
            <div id="lutadoresText" class="section-title">
                <span>Inserir informações do pódio</span>
                <h2>Inserir informações do pódio</h2>

            </div>
            <form>
                <input type="hidden" id="categoria" value="<?= $_GET['categoria'] ?>">
                <input type="hidden" id="competicao" value="<?= $_GET['competicao'] ?>">
                <div class="mb-3">
                    <input type="text" class="form-control" id="search1" placeholder="Pesquisar atleta" oninput="getAtleta(<?= $_GET['categoria'] ?>,<?= $_GET['competicao'] ?>,this,'atl1')">
                </div>
                <div class="mb-3">
                    <label for="atl1">Selecione o atleta da 1° colocação</label>
                    <select id="atl1" class="form-select atletas" multiple aria-label="multiple select example" onchange="setInputValue('search1','atl1')">
                        <option value="">Atleta externo</option>
                        <?php
                        foreach ($atletas as $at) { ?>
                            <option value="<?= $at->getId() ?>"><?= $at->getNome() ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="search2" placeholder="Pesquisar atleta" oninput="getAtleta(<?= $_GET['categoria'] ?>,<?= $_GET['competicao'] ?>,this,'atl2')">
                </div>

                <div class="mb-3">
                    <label for="atl2">Selecione o atleta da 2° colocação</label>
                    <select id="atl2" class="form-select atletas" multiple aria-label="multiple select example" onchange="setInputValue('search2','atl2')">
                        <option value="">Atleta externo</option>
                        <?php
                        foreach ($atletas as $at) { ?>
                            <option value="<?= $at->getId() ?>"><?= $at->getNome() ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" id="search3" placeholder="Pesquisar atleta" oninput="getAtleta(<?= $_GET['categoria'] ?>,<?= $_GET['competicao'] ?>,this,'atl3')">
                </div>

                <div class="mb-3">
                    <label for="atl3">Selecione o atleta da 3° colocação</label>
                    <select id="atl3" class="form-select atletas" multiple aria-label="multiple select example" onchange="setInputValue('search3','atl3')">
                        <option value="">Atleta externo</option>
                        <?php
                        foreach ($atletas as $at) { ?>
                            <option value="<?= $at->getId() ?>"><?= $at->getNome() ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" id="search3_2" placeholder="Pesquisar atleta" oninput="getAtleta(<?= $_GET['categoria'] ?>,<?= $_GET['competicao'] ?>,this,'atl3_2')">
                </div>

                <div class="mb-3">
                    <label for="atl3_2">Selecione o atleta da 3° colocação</label>
                    <select id="atl3_2" class="form-select atletas" multiple aria-label="multiple select example" onchange="setInputValue('search3_2','atl3_2')">
                        <option value="">Atleta externo</option>
                        <?php
                        foreach ($atletas as $at) { ?>
                            <option value="<?= $at->getId() ?>"><?= $at->getNome() ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="p1">Pontuação para a 1° colocação</label>
                    <input type="number" class="form-control" id="p1" aria-describedby="faltas" placeholder="Pontuação do 1° lugar">

                </div>

                <div class="form-group">
                    <label for="p2">Pontuação para a 2° colocação</label>
                    <input type="number" class="form-control" id="p2" aria-describedby="faltas" placeholder="Pontuação do 2° lugar">

                </div>

                <div class="form-group">
                    <label for="p3">Pontuação para a 3° colocação</label>
                    <input type="number" class="form-control" id="p3" aria-describedby="faltas" placeholder="Pontuação do 3° lugar">

                </div>

                <div class="form-group">
                    <label for="p3_2">Pontuação para a 3° colocação</label>
                    <input type="number" class="form-control" id="p3_2" aria-describedby="faltas" placeholder="Pontuação do 3° lugar">

                </div>

            </form>
            
        </div>
        <button type="button" id="cad" class="btn btn-primary" onclick="insertPodio()">Inserir pódio</button>
    </div>
    <script src="../../JudoSystem/view/js/podioAjax.js"></script>
</body>

</html>