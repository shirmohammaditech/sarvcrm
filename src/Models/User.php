<?php
namespace App\Models;

use Requtize\QueryBuilder\Connection;
use Requtize\QueryBuilder\QueryBuilder\QueryBuilderFactory;
use Requtize\QueryBuilder\ConnectionAdapters\PdoBridge;

class User {
    private $pdo;

    public function __construct() {
        $db_config = get_config("Database");
        $dsn = "mysql:dbname={$db_config['dbname']};host={$db_config['host']}";
        $user = $db_config["user"];
        $password = $db_config["password"];

        $this->pdo = new \PDO($dsn, $user, $password);
    }

    public function get_by_id($id) {
        /*
        $sql = "SELECT `id`, `name`, `email`, `password` FROM users WHERE id = $id";
        $result = $this->db->query($sql);
        return $result->fetch_assoc();
        */
        // Build Connection object with PdoBridge ad Adapter
$conn = new Connection(new PdoBridge($this->pdo));

// Pass this connection to Factory
$qbf = new QueryBuilderFactory($conn);

// Now we can use the factory as QueryBuilder - it creates QueryBuilder
// object every time we use some of method from QueryBuilder and returns it.
$result = $qbf->from('users')->where('id', '=', 1)->all();
return $result;
    }

    public function save($user) {
        // Prepare and execute SQL query to insert or update user data
    }

    public function __destruct() {
        //$this->db->close();
    }
}