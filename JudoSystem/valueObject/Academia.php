<?php
    class Academia{
        private $id;
        private $numero;
        private $nome;
        private $estado;
        private $cidade;
        private $bairro;
        private $complemento;
        private $logradouro;
        private $user;

        public function __construct($id,$num_contato, $nome, $estado, $cidade, $bairro, $complemento, $logradouro,$user){
            $this->id = $id;
            $this->numero = $num_contato;
            $this->nome = $nome;
            $this->estado = $estado;
            $this->cidade = $cidade;
            $this->bairro = $bairro;
            $this->complemento = $complemento;
            $this->logradouro = $logradouro;
            $this->user = $user;
        }

        public function getNumero(){
            return $this->numero;
        }
        public function setNumero($num_contato){
            $this->numero = $num_contato;
        }

        public function getNome(){
            return $this->nome;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getEstado(){
            return $this->estado;
        }
        public function setEstado($estado){
            $this->estado = $estado;
        }

        public function getCidade(){
            return $this->cidade;
        }
        public function setCidade($cidade){
            $this->cidade = $cidade;
        }

        public function getBairro(){
            return $this->bairro;
        }
        public function setBairro($bairro){
            $this->bairro = $bairro;
        }

        public function getComplemento(){
            return $this->complemento;
        }
        public function setComplemento($complemento){
            $this->complemento = $complemento;
        }

        public function getLogradouro(){
            return $this->logradouro;
        }
        public function setLogradouro($logradouro){
            $this->logradouro = $logradouro;
        }
        public function getUser(){
            return $this->user;
        }
        public function setUser($user){
            $this->user = $user;
        }
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = $id;
        }

        public function toStdClass(){
            // private $id;
            // private $numero;
            // private $nome;
            // private $estado;
            // private $cidade;
            // private $bairro;
            // private $complemento;
            // private $logradouro;
            // private $user;
            $std = new stdClass();
            $std->id = $this->id;
            $std->numero = $this->numero;
            $std->nome = $this->nome;
            $std->estado = $this->estado;
            $std->cidade = $this->cidade;
            $std->bairro = $this->bairro;
            $std->complemento = $this->complemento;
            $std->logradouro = $this->logradouro;
            $std->user = $this->user;

            return $std;
        }
    }
?>