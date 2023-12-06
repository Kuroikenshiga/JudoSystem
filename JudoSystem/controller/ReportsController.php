<?php
    require_once('./JudoSystem/reports/AtletasReports.php');
    require_once('./JudoSystem/model/Model.php');
    class ReportsController{

        public function showRankingAtletas(){
            $reports = new AtletaReports(Model::createConnection());
            $array = $reports->selectAllAtletasByAmountMedalhas();

            require_once('./JudoSystem/view/reportAtletaRankingView.php');
        }
        public function showPerfomanceAtelta(){
            $reports = new AtletaReports(Model::createConnection());
            $atleta = $reports->selectByIdPerformanceAtleta(isset($_GET['id'])?$_GET['id']:null);
            require_once('./JudoSystem/view/atletaReportsPerfomanceView.php');
        }
    }

?>