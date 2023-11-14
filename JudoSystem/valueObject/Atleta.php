<?php
    class Atleta{
        private $id;
        private $nome;
        private $faixa;
        private $genero;
        private $data_nascimento;
        private $pontuacao;
        private $academia;

        public function __construct($id,$nome, $faixa, $genero, $data_nascimento, $pontuacao, $academia){;
            $this->nome = $nome;
            $this->faixa = $faixa;
            $this->genero = $genero;
            $this->data_nascimento = $data_nascimento;
            $this->pontuacao = $pontuacao;
            $this->academia = $academia;
            $this->id = $id;
        }
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = $id;
        }
        public function getNome(){
            return $this->nome;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getFaixa(){
            return $this->faixa;
        }
        public function setFaixa($faixa){
            $this->faixa = $faixa;
        }

        public function getGenero(){
            return $this->genero;
        }
        public function setGenero($genero){
            $this->genero = $genero;
        }

        public function getData_Nascimento(){
            return $this->data_nascimento;
        }
        public function setData_Nascimento($data_nascimento){
            $this->data_nascimento = $data_nascimento;
        }

        public function getPontuacao(){
            return $this->pontuacao;
        }
        public function setPontuacao($pontuacao){
            $this->pontuacao = $pontuacao;
        }
        public function getAcademia(){
            return $this->academia;
        }
        public function setAcademia($academia){
            $this->academia = $academia;
        }

        public function toStdClass(){
            $std = new stdClass();
            $std->id = $this->id;
            $std->nome = $this->nome;
            $std->faixa = $this->faixa;
            $std->genero = $this->genero;
            $std->data_nascimento = $this->data_nascimento;
            $std->pontuacao = $this->pontuacao;
            $std->academia = $this->academia;
            return $std;
        }
    }
?>