<?php
namespace App\Libraries;

class Database {
    private $dbConnection = null;

    public function __construct() {
        $db_config = get_config("Database");
        $db = $db_config['dbname'];
        $host = $db_config['host'];
        $user = $db_config["user"];
        $pass = $db_config["password"];
        $port = $db_config["port"];

        try {
            $this->dbConnection = new \PDO(
                "mysql:host=$host;port=$port;dbname=$db",
                $user,
                $pass
            );
          } catch (\PDOException $e) {
            exit($e->getMessage());
          }
        }
      
        public function connet()
        {
          return $this->dbConnection;
    }
}