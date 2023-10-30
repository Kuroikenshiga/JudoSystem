<?php
    class User{
        private $id;
        private $nome;
        private $senha;
        private $email;
        private $academia;
        public function __construct($id,$nome,$senha,$email)
        {   
            $this->id = $id;
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
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = $id;
        }
        public function getAcademia(){
            return $this->academia;
        }
        public function setAcademia($academia){
            $this->academia = $academia;
        }
    }

?>