<?php
    class Lutas{
        private $id_lutas;
        private $tempo;
        private $hansoku_make;
        private $goldenScore;
        private $categoria_fk;
        private $lutadores;

        public function __construct($id_lutas, $tempo, $hansoku_make, $goldenScore, $categoria_fk){
            $this->id_lutas = $id_lutas;
            $this->tempo = $tempo;
            $this->hansoku_make  = $hansoku_make?1:0;
            $this->goldenScore = $goldenScore;
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

     

        public function getGoldenScore(){
            return $this->goldenScore;
        }
        public function setGoldenScore($goldenScore){
            $this->goldenScore = $goldenScore;
        }

        public function getCategoria_fk(){
            return $this->categoria_fk;
        }
        public function setCategoria_fk($categoria_fk){
            $this->categoria_fk = $categoria_fk;
        }
        public function toStdClass(){
            $std = new stdClass();
            $std->id_lutas = $this->id_lutas;
            $std->tempo = $this->tempo;
            $std->hansoku_make = $this->hansoku_make;
            $std->goldenScore = $this->goldenScore;
            $std->categoria_fk = $this->categoria_fk;
            return $std;
        }
    }
?>