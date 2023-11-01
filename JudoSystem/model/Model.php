<?php
    abstract class Model{
        private $connection;
        private static $connectionOfModel;
        public function __construct($connection)
        {
            $this->connection = $connection;
        }

        public function getConnection(){
            return $this->connection;
        }
        
        public static function createConnection(){
            if(Model::$connectionOfModel == null){
                try{
                    Model::$connectionOfModel =  new PDO("pgsql: host=localhost; port=5432; dbname=JudoSystem; password=1; user=postgres");
                    return Model::$connectionOfModel;
                }
                catch(Exception $e){
                    Model::$connectionOfModel = new PDO("pgsql: host=localhost; port=5432; dbname=JudoSystem; password=mqrlg; user=postgres");
                    return Model::$connectionOfModel;
                    }
            }
            return Model::$connectionOfModel;
            // 
            
        }

        public function getConnectionOfModel(){
            return Model::$connectionOfModel;
        }

        public function connetionIsSet(){
            return $this->connection != null;
        }

        public abstract function insert($obj);
        public abstract function update($obj);
        public abstract function delete($id);
        public abstract function selectAll();
        public abstract function selectById($id);

    }

?>