<?php
    class Academia{
        private $num_contato;
        private $nome;
        private $estado;
        private $cidade;
        private $bairro;
        private $complemento;
        private $logradouro;

        public function __construct($num_contato, $nome, $estado, $cidade, $bairro, $complemento, $logradouro){
            $this->num_contato = $num_contato;
            $this->nome = $nome;
            $this->estado = $estado;
            $this->cidade = $cidade;
            $this->bairro = $bairro;
            $this->complemento = $complemento;
            $this->logradouro = $logradouro;
        }

        public function getNum_contato(){
            return $this->$num_contato;
        }
        public function setNum_contato($num_contato){
            $this->num_contato = $num_contato;
        }

        public function getNome(){
            return $this->$nome;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getEstado(){
            return $this->$estado;
        }
        public function setEstado($estado){
            $this->estado = $estado;
        }

        public function getCidade(){
            return $this->$cidade;
        }
        public function setCidade($cidade){
            $this->cidade = $cidade;
        }

        public function getBairro(){
            return $this->$bairro;
        }
        public function setBairro($bairro){
            $this->bairro = $bairro;
        }

        public function getComplemento(){
            return $this->$complemento;
        }
        public function setComplemento($complemento){
            $this->complemento = $complemento;
        }

        public function getLogradouro(){
            return $this->$logradouro;
        }
        public function setLogradouro($logradouro){
            $this->logradouro = $logradouro;
        }
    }
?>