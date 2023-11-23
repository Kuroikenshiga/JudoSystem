<!DOCTYPE html>
<html lang="en">
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
<?php require_once('./JudoSystem/view/header.php')?>
<div id="principal">
        
            <h1>Modifica Luta</h1>
            
            <form action="index.php" >
                <input type="hidden" value="Lutas" name="class">
                <input type="hidden" value="update" name="method">
                <input type="hidden" id="id_lutas" value="<?php echo $lutas->getIdLutas() ?>">

                <div class="form-group">
                    <label for="tempo">Tempo</label>
                    <input type="time" class="form-control" id="tempo" value="<?php echo $lutas->getTempo() ?>">
                </div>

                <div class="form-group">
                    <label for="hansoku_make">Hansoku-Make</label>
                    <input type="text" class="form-control" id="hansoku_make" value="<?php echo $lutas->getHansokuMake() ?>">
                </div>

                <div class="form-group">
                    <label for="ganhou">Ganhou</label>
                    <input type="text" class="form-control" id="ganhou" value="<?php echo $lutas->getGanhou() ?>">
                </div>

                <div class="form-group">
                    <label for="goldenScore">Golden Score</label>
                    <input type="time" class="form-control" id="goldenScore" value="<?php echo $lutas->getGoldenScore() ?>">
                </div>

                <button type="button" class="btn btn-primary" onclick="update()">Modificar</button>
            </form>
        
    </div>
    <script src="../../JudoSystem/view/js/lutasAjax.js"></script>
</body>
</html>