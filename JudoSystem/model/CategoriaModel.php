<?php
    class CategoriaModel extends Model{

        public function insert($obj){}

        public function delete($id){}

        public function update($obj){}

        public function selectAll(){
            require_once('./JudoSystem/valueObject/Categoria.php');
            $categorias = [];
            try{
                $stmt = $this->getConnection()->prepare('select * from categoria');
                $stmt->execute();
                while($rows = $stmt->fetch()){
                    $categorias[] = new Categoria($rows['id_categoria'],$rows['classe'],$rows['genero'],$rows['peso']);
                }
            }
            catch(Exception $e){
                return false;
            }
            return $categorias;
        }
        public function selectAllClasses(){
            require_once('./JudoSystem/valueObject/Categoria.php');
            $categorias = [];
            try{
                $stmt = $this->getConnection()->prepare('select distinct(classe) from categoria');
                $stmt->execute();
                while($rows = $stmt->fetch()){
                    $categorias[] = $rows['classe'];
                }
            }
            catch(Exception $e){
                return false;
            }
            return $categorias;
        }
        public function selectAllPesosPorGeneros($g,$c){
            require_once('./JudoSystem/valueObject/Categoria.php');
            $peso = [];
            try{
                $stmt = $this->getConnection()->prepare('select distinct(peso) from categoria where genero = ? and classe = ? order by peso ASC');
                $stmt->bindValue(1,$g);
                $stmt->bindValue(2,$c);
                $stmt->execute();
                
                while($rows = $stmt->fetch()){

                    $peso[] = $rows['peso'];
                }
            }
            catch(Exception $e){
                return false;
            }
            return $peso;
        }
        public function selectCategoria($g,$c,$p){
            require_once('./JudoSystem/valueObject/Categoria.php');
            $peso = [];
            try{
                $stmt = $this->getConnection()->prepare('select id_categoria from categoria where genero = ? and classe = ? and peso = ? order by peso ASC');
                $stmt->bindValue(1,$g);
                $stmt->bindValue(2,$c);
                $stmt->bindValue(3,$p);
                $stmt->execute();
                
              
            }
            catch(Exception $e){
                return false;
            }
            return $stmt->fetch()['id_categoria'];
        }
        public function selectById($id){
            require_once('./JudoSystem/valueObject/Categoria.php');
            $categorias;
            try{
                $stmt = $this->getConnection()->prepare('select * from categoria where id_categoria = ?');
               
                $stmt->bindValue(1,$id);
                $stmt->execute();
                $rows = $stmt->fetch();
                    $categoria = new Categoria($rows['id_categoria'],$rows['classe'],$rows['genero'],$rows['peso']);
            }
            catch(Exception $e){
                return false;
            }
            return $categoria;
        }
    }

?>