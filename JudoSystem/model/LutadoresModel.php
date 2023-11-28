<?php
    require_once('./JudoSystem/valueObject/Lutadores.php');
    class LutadoresModel extends Model{

        
        public function insert($obj){
            try{
                $stmt = $this->getConnection()->prepare('INSERT INTO lutadores(wazari_1, wazari_2, ippon, tecnica_ne_waza, tecnica, forca, condicionamento_fisico, falta_lutador, luta_fk,lutador_casa)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)');
                $stmt->bindValua(1,$obj->getWazari1());
                $stmt->bindValua(2,$obj->getWazari2());
                $stmt->bindValua(3,$obj->getIppon());
                $stmt->bindValua(4,$obj->getTecnicaNeWaza());
                $stmt->bindValua(5,$obj->getTecnica());
                $stmt->bindValua(6,$obj->getForca());
                $stmt->bindValua(7,$obj->getCondicionamentoFisico());
                $stmt->bindValua(8,$obj->getFaltas());
                $stmt->bindValua(9,$obj->getLuta_fk());
                $stmt->bindValua(10,$obj->getLutadorDaCasa());
                $stmt->execute();
            }catch(Exception $e){
                return false;
            }
            return true;
        }
        public function update($obj){}
        public function delete($id){}
        public function selectAll(){}
        public function selectById($id){}
    }

?>