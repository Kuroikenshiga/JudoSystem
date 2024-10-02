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
            $array = $reports->selectAllFiltredByPerfomances(isset($_POST['metricas'])?$_POST['metricas']:null);
            
                echo(json_encode($array));

        }

        public function showPerfomanceAtelta(){
            $reports = new AtletaReports(Model::createConnection());
            $atleta = $reports->selectByIdPerformanceAtleta(isset($_GET['metricas'])?$_GET['metricas']:null);
            $strokes = $reports->strokeReport(isset($_GET['metricas'])?$_GET['metricas']:null);
            $strokesNeWaza = $reports->neWazaReport(isset($_GET['metricas'])?$_GET['metricas']:null);
            $atletaReport = $reports->selectReports($_GET['metricas']);
            require_once('./JudoSystem/view/atletaReportsPerfomanceView.php');
        }
    }

?>