<?php
    require_once('./JudoSystem/valueObject/Lutadores.php');
    class LutadoresModel extends Model{

        
        public function insert($obj){
            try{
                $stmt = $this->getConnection()->prepare('INSERT INTO lutadores(
                    wazari_1, atleta_fk, wazari_2, ippon, tecnica_ne_waza, tecnica, forca, condicionamento_fisico, qtd_falta_lutador, luta_fk, ganhador)
                   VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
                $stmt->bindValue(1,$obj->getWazari1());
                $stmt->bindValue(2,$obj->getAtletaFk());
                $stmt->bindValue(3,$obj->getWazari2());
                $stmt->bindValue(4,$obj->getIppon());
                $stmt->bindValue(5,$obj->getTecnicaNeWaza());
                $stmt->bindValue(6,$obj->getTecnica());
                $stmt->bindValue(7,$obj->getForca());
                $stmt->bindValue(8,$obj->getCondicionamentoFisico());
                $stmt->bindValue(9,$obj->getQtdFaltas());
                $stmt->bindValue(10,$obj->getLuta_fk());
                $stmt->bindValue(11,$obj->getGanhador());
                $stmt->execute();
            }catch(Exception $e){
                echo $e->getMessage();
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