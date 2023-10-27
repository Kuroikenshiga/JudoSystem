<?php
    class Atleta{
        private $nome;
        private $faixa;
        private $genero;
        private $data_nascimento;
        private $pontuacao;

        public function __construct($nome, $faixa, $genero, $data_nascimento, $pontuacao){;
            $this->nome = $nome;
            $this->faixa = $faixa;
            $this->genero = $genero;
            $this->data_nascimento = $data_nascimento;
            $this->pontuacao = $pontuacao;
        }

        public function getNome(){
            return $this->$nome;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getFaixa(){
            return $this->$faixa;
        }
        public function setFaixa($faixa){
            $this->faixa = $faixa;
        }

        public function getGenero(){
            return $this->$genero;
        }
        public function setGenero($genero){
            $this->genero = $genero;
        }

        public function getData_Nascimento(){
            return $this->$data_nascimento;
        }
        public function setData_Nascimento($data_nascimento){
            $this->data_nascimento = $data_nascimento;
        }

        public function getPontuacao(){
            return $this->$pontuacao;
        }
        public function setPontuacao($pontuacao){
            $this->pontuacao = $pontuacao;
        }

    }
?>