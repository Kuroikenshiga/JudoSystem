<?php
    class Lutas{
        private $tempo;
        private $hansokuMake;
        private $ganhou;
        private $goldenScore;

        public function __construct($tempo, $hansokuMake, $ganhou, $goldenScore){
            $this->tempo = $tempo;
            $this->hansokuMake  = $hansokuMake;
            $this->ganhou = $ganhou;
            $this->goldenScore = $goldenScore;
        }

        public function getTempo(){
            return $this->$tempo;
        }
        public function setTempo($tempo){
            $this->tempo = $tempo;
        }

        public function getHansokuMake(){
            return $this->$hansokuMake;
        }
        public function setHansokuMake($hansokuMake){
            $this->hansokuMake = $hansokuMake;
        }

        public function getGanhou(){
            return $this->$ganhou;
        }
        public function setGanhou($ganhou){
            $this->ganhou = $ganhou;
        }

        public function getGoldenScore(){
            return $this->$goldenScore;
        }
        public function setGoldenScore($goldenScore){
            $this->goldenScore = $goldenScore;
        }
    }
?>