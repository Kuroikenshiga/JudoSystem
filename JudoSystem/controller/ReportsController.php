<?php
    require_once('./JudoSystem/reports/AtletasReports.php');
    require_once('./JudoSystem/model/Model.php');
    class ReportsController{

        public function showRankingAtletasMedalhas(){
            $reports = new AtletaReports(Model::createConnection());
            $array = $reports->selectAllAtletasByAmountMedalhas();
            if(isset($_POST['metricas'])){
                die(json_encode($array));
            }
            require_once('./JudoSystem/view/reportAtletaRankingView.php');
        }
        public function showRankingAtletasFiltred(){
            $reports = new AtletaReports(Model::createConnection());
            $array = $reports->selectAllFiltredByPerfomances(isset($_POST['metrica'])?$_POST['metrica']:null);
            
                echo(json_encode($array));

        }

        public function showPerfomanceAtelta(){
            $reports = new AtletaReports(Model::createConnection());
            $atleta = $reports->selectByIdPerformanceAtleta(isset($_GET['id'])?$_GET['id']:null);
            require_once('./JudoSystem/view/atletaReportsPerfomanceView.php');
        }
    }

?>