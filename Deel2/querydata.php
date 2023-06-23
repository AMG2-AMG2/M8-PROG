<?php
namespace Main;

use PDO;
use PDOException;

class DataQuery
{
    private $db;

    public function __construct(DatabaseConnection $db)
    {
        $this->db = $db;
    }

    public function getDataFromTable($tableName)
    {
        $query = "SELECT * FROM {$tableName}";

        try {
            $pdo = $this->db->getConnection();
            $statement = $pdo->prepare($query);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Query exucution failed: " . $e->getMessage();
        }
    }
}
