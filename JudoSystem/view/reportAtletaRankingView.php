<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <link rel="stylesheet" href="../../JudoSystem//view//css//reports.css">
    <!-- Template Main CSS File -->
    <link href="../../JudoSystem/view/assets/css/style.css" rel="stylesheet">
</head>

<body>
    <?php require_once('./JudoSystem/view/header.php'); $i = 0;?>
    <div id="principal">
    <div class="section-title">
                <span>Ranking de atletas com mais medalhas</span>
                <h2>Ranking de atletas com mais medalhas</h2>
        
            </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Faixa</th>
                    <th scope="col">Genero</th>
                    <th scope="col" id="center">Quantidade de medalhas</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($array as $a){ ?>
                <tr>
                    <th scope="row"><?=$i+1?></th>
                    <td><?=$a->nome?></td>
                    <td><?=$a->faixa?></td>
                    <td><?=$a->genero?></td>
                    <td><?=$a->qtd?></td>
                </tr>
                <?php $i++; }?>
            </tbody>
        </table>
    </div>
</body>

</html>