<?php
    class User{
        private $nome;
        private $senha;

        public function __construct($nome,$senha,$email)
        {
            $this->nome = $nome;
            $this->senha = $senha;
            $this->email = $email;
        } 

        public function getNome(){
            return $this->nome;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }
            
        public function getSenha(){
            return $this->senha;
        }
        public function setSenha($senha){
            $this->senha = $senha;
        }

        public function getEmail(){
            return $this->email;
        }
        public function setEmail($email){
            $this->email = $email;
        }
    }

?>