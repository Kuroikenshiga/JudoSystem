<?php
    class Inscricao{
        private $id_inscricao;
        private $atleta_fk;
        private $competicao_fk;
        private $categoria_fk;
        private $data_inscricao;
        private $hora_inscricao;
        
        public function __construct($id_inscricao,$atleta_fk, $competicao_fk, $categoria_fk, $data_inscricao, $hora_inscricao){;
            $this->id_inscricao = $id_inscricao;
            $this->atleta_fk = $atleta_fk;
            $this->competicao_fk = $competicao_fk;
            $this->categoria_fk = $categoria_fk;
            $this->data_inscricao = $data_inscricao;
            $this->hora_inscricao = $hora_inscricao;
        }
        public function getId_inscricao(){
            return $this->id_inscricao;
        }
        public function setId_inscricao($id_inscricao){
            $this->id_inscricao = $id_inscricao;
        }
        
        public function getAtleta_fk(){
            return $this->atleta_fk;
        }
        public function setAtleta_fk($atleta_fk){
            $this->atleta_fk = $atleta_fk;
        }
        
        public function getCompeticao_fk(){
            return $this->competicao_fk;
        }
        public function setCompeticao_fk($competicao_fk){
            $this->competicao_fk = $competicao_fk;
        }
        
        public function getCategoria_fk(){
            return $this->categoria_fk;
        }
        public function setCategoria_fk($categoria_fk){
            $this->categoria_fk = $categoria_fk;
        }
        
        public function getData_inscricao(){
            return $this->data_inscricao;
        }
        public function setData_inscricao($data_inscricao){
            $this->data_inscricao = $data_inscricao;
        }
        
        public function getHora_inscricao(){
            return $this->hora_inscricao;
        }
        public function setHora_inscricao($hora_inscricao){
            $this->hora_inscricao = $hora_inscricao;
        }
        
    }
?>