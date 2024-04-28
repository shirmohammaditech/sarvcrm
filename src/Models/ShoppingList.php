<?php
namespace App\Models;

use Requtize\QueryBuilder\Connection;
use Requtize\QueryBuilder\QueryBuilder\QueryBuilderFactory;
use Requtize\QueryBuilder\ConnectionAdapters\PdoBridge;

class ShoppingList {
    private $pdo;

    public function __construct() {
        $db_config = get_config("Database");
        $dsn = "mysql:dbname={$db_config['dbname']};host={$db_config['host']}";
        $user = $db_config["user"];
        $password = $db_config["password"];

        $this->pdo = new \PDO($dsn, $user, $password);
    }

    public function get_by_user_id($user_id) {
        $conn = new Connection(new PdoBridge($this->pdo));
        $qbf = new QueryBuilderFactory($conn);
        $result = $qbf->from('shopping_lists')
        ->where('user_id', '=', $user_id)
        ->all();
        return $result;
    }

    public function save($data) {
        // Prepare and execute SQL query to insert list data
        $conn = new Connection(new PdoBridge($this->pdo));
        $qbf = new QueryBuilderFactory($conn);
        $result = $qbf->insert($data, 'shopping_lists');
        return $result;



    }
}