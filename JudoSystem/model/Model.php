<?php
    abstract class Model{
        private $connection;

        public function __construct($connection)
        {
            $this->connection = $connection;
        }

        public function getConnection(){
            return $this->connection;
        }
        
        public static function createConnection(){
            return new PDO("pgsql: host=localhost; port=5432; dbname=JudoSystem; password=1; user=postgres");
            // return new PDO("pgsql: host=localhost; port=5432; dbname=JudoSystem; password=mqrlg; user=postgres");
            
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