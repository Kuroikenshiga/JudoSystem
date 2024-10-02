<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
require_once('./JudoSystem/tools/redirectToErrorLoginView.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfomance do atleta</title>
    <link rel="stylesheet" href="../../JudoSystem/view/css/reports.css">
    <link rel="shortcut icon" href="../../JudoSystem/view/img/logo.png" type="image/x-icon">
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
            data.addColumn({
                role: 'style'
            });
            data.addRows([
                ['Técnica', <?= $atleta->t == null ? 0 : $atleta->t ?>, '#020527'],
                ['Força', <?= $atleta->f == null ? 0 : $atleta->f ?>, '#258262'],
                ['Condicionamento fisico', <?= $atleta->c == null ? 0 : $atleta->c ?>, '#CFC70A'],

            ]);

            // Set chart options
            var options = {
                'title': 'Desempenho geral de <?= $atleta->nome ?> nas lutas',
                'width': 700,
                'height': 300,
                'legend': {
                    position: "none"
                },
                vAxis: {
                    viewWindow: {
                        max: 10 // Define o valor máximo do eixo Y como 3000
                    }
                }

            };

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
        google.charts.setOnLoadCallback(drawChartStrokes);

        function drawChartStrokes() {

            // Create the data table.
            var data = new google.visualization.DataTable();

            data.addColumn('string', 'Golpe');
            data.addColumn('number', '');
            data.addColumn({
                role: 'style'
            });
            data.addRows([
                <?php
                foreach ($strokes as $s) { ?>["<?= $s->golpe ?>", <?= $s->qtd ?>, '<?= $s->color ?>'],
                <?php
                } ?>

            ]);

            // Set chart options
            var options2 = {
                'title': 'Golpes usados com mais frequência por <?= $atleta->nome ?> nas lutas',
                'width': 700,
                'height': 300,
                'legend': {
                    position: "none"
                },


            };

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.BarChart(document.getElementById('chart_div2'));
            chart.draw(data, options2);
        }
        google.charts.setOnLoadCallback(drawChartNeWaza);
        function drawChartNeWaza() {

            // Create the data table.
            var data = new google.visualization.DataTable();

            data.addColumn('string', 'Técnica de solo');
            data.addColumn('number', '');
            data.addColumn({
                role: 'style'
            });
            data.addRows([
                <?php
                foreach ($strokesNeWaza as $s) { ?>["<?= $s->golpe ?>", <?= $s->qtd ?>, '<?= $s->color ?>'],
                <?php
                } ?>

            ]);

            // Set chart options
            var options3 = {
                'title': 'Técnicas de solo mais usadas por <?= $atleta->nome ?> nas lutas',
                'width': 700,
                'height': 300,
                'legend': {
                    position: "none"
                },


            };

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.BarChart(document.getElementById('chart_div3'));
            chart.draw(data, options3);
        }
    </script>
</head>

<body>

    <?php require_once('./JudoSystem/view/header.php') ?>
    <div class="section-title">
        <span>Informações de desempenho de <?= $atleta->nome ?></span>
        <h2>Informações de desempenho de <?= $atleta->nome ?></h2>

    </div>
    <div id="principal">
        <div id="reports">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Vitórias</th>
                        <th scope="col">Derrotas</th>
                        <th scope="col">N° de desqualificações</th>
                        <th scope="col">N° de lutas</th>
                        <th scope="col">Porcentagem de vitórias</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $atletaReport->v ?></td>
                        <td><?= $atletaReport->d ?></td>
                        <td><?= $atletaReport->h ?></td>
                        <td><?= ($atletaReport->v + $atletaReport->d) ?></td>
                        <td><?= ($atletaReport->v * 100) / (($atletaReport->v + $atletaReport->d) == 0 ? 1 : ($atletaReport->v + $atletaReport->d)) ?>%</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="charts">
            <div id="rows">
                <div id="chart_div3"></div>
                <div id="chart_div2"></div>
            </div>
            <div id="rows2">
                <div id="chart_div"></div>
                
            </div>
        </div>
    </div>
    <?php require_once('./JudoSystem/view/footer.php') ?>
</body>

</html>