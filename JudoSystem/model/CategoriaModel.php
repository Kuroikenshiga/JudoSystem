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
                    $categorias[] = new Categoria($rows['id_categoria'],$rows['classe'],$rows['genero'],$row['peso']);
                }
            }
            catch(Exception $e){
                return false;
            }
            return $categorias;
        }

        public function selectById($id){}
    }

?>