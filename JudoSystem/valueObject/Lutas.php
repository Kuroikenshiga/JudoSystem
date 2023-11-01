<?php
    class Lutas{
        private $tempo;
        private $hansoku_make;
        private $ganhou;
        private $goldenScore;

        public function __construct($tempo, $hansoku_make, $ganhou, $goldenScore){
            $this->tempo = $tempo;
            $this->hansoku_make  = $hansoku_make;
            $this->ganhou = $ganhou;
            $this->goldenScore = $goldenScore;
        }

        public function getTempo(){
            return $this->tempo;
        }
        public function setTempo($tempo){
            $this->tempo = $tempo;
        }

        public function getHansokuMake(){
            return $this->hansoku_make;
        }
        public function setHansokuMake($hansoku_make){
            $this->hansoku_make = $hansoku_make;
        }

        public function getGanhou(){
            return $this->ganhou;
        }
        public function setGanhou($ganhou){
            $this->ganhou = $ganhou;
        }

        public function getGoldenScore(){
            return $this->goldenScore;
        }
        public function setGoldenScore($goldenScore){
            $this->goldenScore = $goldenScore;
        }
    }
?>