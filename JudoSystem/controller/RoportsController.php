<?php
    require_once('./JudoSystem/reports/AtletasReports.php');
    require_once('./JudoSystem/model/Model.php');
    class ReportsController{

        public function showRankingAtletas(){
            $reports = new AtletaReports(Model::createConnection());
            $array = $reports->selectAllAtletasByAmountMedalhas();
        }
    }

?>