<?php

class Competicao{
    private $id_competições;
    private $nome;
    private $data_competicao;
    private $estado;
    private $cidade;
    private $bairro;
    private $complemento;
    private $logradouro;
    
    public function getId_competições(){
        return $this->id_competições;
    }
    public function setId_competições($id_competições){
        $this->id_competições = $id_competições;
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