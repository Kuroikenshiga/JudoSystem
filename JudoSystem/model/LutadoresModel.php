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
        public function selectAllByLuta($luta){
            $stmt = $this->getConnection()->prepare('SELECT * FROM lutadores where luta_fk = ?');
            $array = [];
            try{
                $stmt->bindValue(1,$luta);
                $stmt->execute();
                while($row = $stmt->fetch()){
                    $array[] = new Lutadores($row['id_lutadores'],$row['atleta_fk'],$row['wazari_1'],$row['wazari_2'],$row['ippon'],$row['tecnica_ne_waza'],$row['tecnica'],$row['forca'],$row['condicionamento_fisico'],$row['qtd_falta_lutador'],$row['ganhador'],$row['luta_fk']);
                }
            }
            catch(Exception $e){
                echo $e->getMessage();
                return false;
            }
            return $array;
        }
        public function update($obj){}
        public function delete($id){}
        public function selectAll(){}
        public function selectById($id){}
    }

?>