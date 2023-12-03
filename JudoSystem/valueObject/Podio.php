<?php
    class Podio
    {
        private $idPodio;
        private $lugar1;
        private $lugar2;
        private $lugar3;
        private $lugar3_2;
        private $pontuacao1;
        private $pontuacao2;
        private $pontuacao3;
        private $pontuacao3_2;
        private $competicaoFk;
        private $categoriaFk;

        public function __construct($id,$l1,$l2,$l3,$l3_2,$p1,$p2,$p3,$p3_2,$competicaoFk,$categoriaFk){
            $this->idPodio = $id;
            $this->lugar1 = $l1;
            $this->lugar2 = $l2;
            $this->lugar3 = $l3;
            $this->lugar3_2 = $l3_2;
            $this->pontuacao1 = $p1;
            $this->pontuacao2 = $p2;
            $this->pontuacao3 = $p3;
            $this->pontuacao3_2 = $p3_2;
            $this->competicaoFk = $competicaoFk;
            $this->categoriaFk = $categoriaFk;
        }

        public function getIdPodio()
        {
            return $this->idPodio;
        }
        public function setIdPodio($idPodio)
        {
            $this->idPodio = $idPodio;
        }

        public function getLugar1()
        {
            return $this->lugar1;
        }
        public function setLugar1($lugar1)
        {
            $this->lugar1 = $lugar1;
        }

        public function getLugar2()
        {
            return $this->lugar2;
        }
        public function setLugar2($lugar2)
        {
            $this->lugar2 = $lugar2;
        }

        public function getLugar3()
        {
            return $this->lugar3;
        }
        public function setLugar3($lugar3)
        {
            $this->lugar3 = $lugar3;
        }

        public function getLugar3_2()
        {
            return $this->lugar3_2;
        }
        public function setLugar3_2($lugar3_2)
        {
            $this->lugar3_2 = $lugar3_2;
        }

        public function getPontuacao1()
        {
            return $this->pontuacao1;
        }
        public function setPontuacao1($pontuacao1)
        {
            $this->pontuacao1 = $pontuacao1;
        }

        public function getPontuacao2()
        {
            return $this->pontuacao2;
        }
        public function setPontuacao2($pontuacao2)
        {
            $this->pontuacao2 = $pontuacao2;
        }

        public function getPontuacao3()
        {
            return $this->pontuacao3;
        }
        public function setPontuacao3($pontuacao3)
        {
            $this->pontuacao3 = $pontuacao3;
        }

        public function getPontuacao3_2()
        {
            return $this->pontuacao3_2;
        }
        public function setPontuacao3_2($pontuacao3_2)
        {
            $this->pontuacao3_2 = $pontuacao3_2;
        }

        public function getCompeticaoFk()
        {
            return $this->competicaoFk;
        }
        public function setCompeticaoFk($competicaoFk)
        {
            $this->competicaoFk = $competicaoFk;
        }

        public function getCategoriaFk()
        {
            return $this->categoriaFk;
        }
        public function setCategoriaFk($categoriaFk)
        {
            $this->categoriaFk = $categoriaFk;
        }
    }
