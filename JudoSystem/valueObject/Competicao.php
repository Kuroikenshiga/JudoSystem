<?php

class Competicao{
    private $id_competicao;
    private $nome;
    private $data_competicao;
    private $estado;
    private $cidade;
    private $bairro;
    private $complemento;
    private $logradouro;

    public function __construct($id,$nome,$data,$estado,$cidade,$bairro,$complemento,$logradouro){
        $this->id_competicao = $id;
        $this->nome = $nome;
        $this->data_competicao = $data;
        $this->estado = $estado;
        $this->cidade = $cidade;
        $this->bairro = $bairro;
        $this->complemento = $complemento;
        $this->logradouro = $logradouro;
    
    }
    public function getId_competicao(){
        return $this->id_competicao;
    }
    public function setId_competicao($id_competicao){
        $this->id_competicao = $id_competicao;
    }
    
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    
    public function getData_competicao(){
        return $this->data_competicao;
    }
    public function setData_competicao($data_competicao){
        $this->data_competicao = $data_competicao;
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
    
    }
?>