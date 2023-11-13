<?php 
require_once './config.php';
abstract class Model {
    protected $db;

    public function __construct(){
        $this->_createBBDD();
        $this->_deploy();
    }

    /*esta funcion hace que al invocarse algun modelo hijo de esta clase, cree la base de datos con nombre definido en la constante MYSQL_DB */
    private function _createBBDD(){
        try {
            $this->db = new PDO("mysql:host=".MYSQL_HOST, MYSQL_USER, MYSQL_PASS);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $dbname = MYSQL_DB;
        
            $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
        
            $this->db->exec($sql);
        
            
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } 

    }

    /*esta funcion toma la bbdd creada con _createBBDD y si NO contiene tablas le crea las tablas contenidas en el archivo .sql */
    private function _deploy(){
        $this->db = new PDO("mysql:host=".MYSQL_HOST .";dbname=".MYSQL_DB.";charset=utf8", MYSQL_USER, MYSQL_PASS);            
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();

        if(count($tables) == 0){
            $sql = file_get_contents('./db/webtpe.sql');
            $this->db->exec($sql);
       
        }
    }

    public abstract function getAll();
    public abstract function get($id);

   

 
}


?>