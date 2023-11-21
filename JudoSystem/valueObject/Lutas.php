<?php
    class Lutas{
        private $id_lutas;
        private $tempo;
        private $hansoku_make;
        private $ganhou;
        private $goldenScore;
        private $atleta_fk;
        private $categoria_fk;

        public function __construct($id_lutas, $tempo, $hansoku_make, $ganhou, $goldenScore, $atleta_fk, $categoria_fk){
            $this->id_lutas = $id_lutas;
            $this->tempo = $tempo;
            $this->hansoku_make  = $hansoku_make;
            $this->ganhou = $ganhou;
            $this->goldenScore = $goldenScore;
            $this->atleta_fk = $atleta_fk;
            $this->categoria_fk = $categoria_fk;
        }

        public function getIdLutas(){
            return $this->id_lutas;
        }
        public function setIdLutas($id_lutas){
            $this->id_lutas = $id_lutas;
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
        
        public function getAtleta_fk(){
            return $this->atleta_fk;
        }
        public function setAtleta_fk($atleta_fk){
            $this->atleta_fk = $atleta_fk;
        }

        public function getCategoria_fk(){
            return $this->categoria_fk;
        }
        public function setCategoria_fk($categoria_fk){
            $this->categoria_fk = $categoria_fk;
        }
    }
?>