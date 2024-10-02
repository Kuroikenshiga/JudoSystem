<?php
  require_once('./JudoSystem/tools/redirectToErrorLoginView.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../JudoSystem/view/css/forms.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../../JudoSystem/view/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../../JudoSystem/view/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../JudoSystem/view/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../JudoSystem/view/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../JudoSystem/view/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../../JudoSystem/view/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../../JudoSystem/view/img/logo.png" type="image/x-icon">
    <!-- Template Main CSS File -->
    <link href="../../JudoSystem/view/assets/css/style.css" rel="stylesheet">
</head>

<body>
    <?php require_once('./JudoSystem/view/header.php') ?>
    <div id="principal">

        <h1>Cadastro de Atleta</h1>

        <form>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome">
            </div>

            <div class="form-group">
                <label for="faixa">Faixa</label>
                <input type="text" class="form-control" id="faixa">
            </div>

            <div class="form-group">
                <select class="form-select" aria-label="Default select example" id="genero">
                    <option selected>Selecione o gênero</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>

                </select>
            </div>

            <div class="form-group">
                <label for="data_nascimento">Data Nascimento</label>
                <input type="date" class="form-control" id="data_nascimento">
            </div>

            <!-- <div class="form-group">
                <label for="pontucao">Pontuação</label>
                <input type="number" class="form-control" id="pontuacao">
            </div> -->

            <button type="button" class="btn btn-primary" onclick="insert()">Cadastrar</button>

        </form>

    </div>
    <?php require_once('./JudoSystem/view/footer.php') ?>
    <script src="../../JudoSystem/view/js/atletaAjax.js"></script>
</body>

</html>