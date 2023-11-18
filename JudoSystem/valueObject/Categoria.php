<?php
    class Categoria{
        private $idCategoria;
        private $classe;
        private $genero;
        private $peso;
        
        public function __construct($id,$classe,$genero,$peso){
            $this->idCategoria = $id;
            $this->classe = $classe;
            $this->genero = $genero;
            $this->peso = $peso;
        }

        public function getIdCategoria(){
            return $this->idCategoria;
        }
        public function setIdCategoria($idCategoria){
            $this->idCategoria = $idCategoria;
        }
        
        public function getClasse(){
            return $this->classe;
        }
        public function setClasse($classe){
            $this->classe = $classe;
        }
        
        public function getGenero(){
            return $this->genero;
        }
        public function setGenero($genero){
            $this->genero = $genero;
        }
        
        public function getPeso(){
            return $this->peso;
        }
        public function setPeso($peso){
            $this->peso = $peso;
        }
        
    }
?>