<?php

class Lutadores{
    private $idLutadores;
    private $atletaFk;
    private $wazari1;
    private $wazari2;
    private $ippon;
    private $tecnicaNeWaza;
    private $tecnica;
    private $forca;
    private $condicionamentoFisico;
    private $qtdFaltas;
    private $ganhador;
    private $luta_fk;

    public function __construct($id,$atleta,$w1,$w2,$ippon,$tnw,$tecnica,$forca,$condFisico,$faltas,$ganhador,$luta)
    {
        $this->idLutadores = $id;
        $this->wazari1 = $w1;
        $this->wazari2 = $w2;
        $this->ippon = $ippon;
        $this->tecnicaNeWaza = $tnw;
        $this->tecnica = $tecnica;
        $this->forca = $forca;
        $this->condicionamentoFisico = $condFisico;
        $this->qtdFaltas = $faltas;
        $this->luta_fk = $luta;
        $this->atletaFk = $atleta;
        $this->ganhador = $ganhador?1:0;
    }

    public function getIdLutadores(){
        return $this->idLutadores;
    }
    public function setIdLutadores($idLutadores){
        $this->idLutadores = $idLutadores;
    }
    
    public function getAtletaFk(){
        return $this->atletaFk;
    }
    public function setAtletaFk($atletaFk){
        $this->atletaFk = $atletaFk;
    }
    
    public function getWazari1(){
        return $this->wazari1;
    }
    public function setWazari1($wazari1){
        $this->wazari1 = $wazari1;
    }
    
    public function getWazari2(){
        return $this->wazari2;
    }
    public function setWazari2($wazari2){
        $this->wazari2 = $wazari2;
    }
    
    public function getIppon(){
        return $this->ippon;
    }
    public function setIppon($ippon){
        $this->ippon = $ippon;
    }
    
    public function getTecnicaNeWaza(){
        return $this->tecnicaNeWaza;
    }
    public function setTecnicaNeWaza($tecnicaNeWaza){
        $this->tecnicaNeWaza = $tecnicaNeWaza;
    }
    
    public function getTecnica(){
        return $this->tecnica;
    }
    public function setTecnica($tecnica){
        $this->tecnica = $tecnica;
    }
    
    public function getForca(){
        return $this->forca;
    }
    public function setForca($forca){
        $this->forca = $forca;
    }
    
    public function getCondicionamentoFisico(){
        return $this->condicionamentoFisico;
    }
    public function setCondicionamentoFisico($condicionamentoFisico){
        $this->condicionamentoFisico = $condicionamentoFisico;
    }
    
    public function getQtdFaltas(){
        return $this->qtdFaltas;
    }
    public function setQtdFaltas($qtdFaltas){
        $this->qtdFaltas = $qtdFaltas;
    }
    
    public function getGanhador(){
        return $this->ganhador;
    }
    public function setGanhador($ganhador){
        $this->ganhador = $ganhador;
    }
    
    public function getLuta_fk(){
        return $this->luta_fk;
    }
    public function setLuta_fk($luta_fk){
        $this->luta_fk = $luta_fk;
    }
    
    }

?>