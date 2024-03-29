<?php
    session_start();
    require_once('./JudoSystem/tools/redirectToErrorLoginView.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfomance do atleta</title>
    <link rel="stylesheet" href="../../JudoSystem/view/css/reports.css">
    <link href="../../JudoSystem/view/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../../JudoSystem/view/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../JudoSystem/view/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../JudoSystem/view/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../JudoSystem/view/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../../JudoSystem/view/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    
    <!-- Template Main CSS File -->
    <link href="../../JudoSystem/view/assets/css/style.css" rel="stylesheet">


    <!--Load the AJAX API-->
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

            data.addColumn('string', 'Desempenho');
            data.addColumn('number', '');
            data.addColumn({role:'style'});
            data.addRows([
                ['Técnica', <?= $atleta->t == null ? 0 : $atleta->t ?>,'blue'],
                ['Força', <?= $atleta->f == null ? 0 : $atleta->f ?>,'red'],
                ['Condicionamento fisico', <?= $atleta->c == null ? 0 : $atleta->c ?>,'green'],

            ]);

            // Set chart options
            var options = {
                'title': 'Desempenho geral de <?= $atleta->nome ?> nas lutas',
                'width': 700,
                'height': 300,
                'legend': { position: "none" },
            };

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</head>

<body>

    <?php require_once('./JudoSystem/view/header.php') ?>
    <div id="principal">
        <div id="chart_div"></div>
    </div>
    <?php require_once('./JudoSystem/view/footer.php') ?>
</body>

</html>