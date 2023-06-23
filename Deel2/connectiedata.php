<?php
namespace Main;

use PDO;

class DatabaseConnection
{
    private $pdo;

    public function __construct($host, $username, $password, $dbname, $charset = 'utf8', $port = 8180)
    {
        $dsn = "mysql:host={$host};dbname={$dbname};charset={$charset};port={$port}";

        $this->pdo = new PDO($dsn, $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}

class DataQuery
{
    private $database;

    public function __construct(DatabaseConnection $database)
    {
        $this->database = $database;
    }

    public function getDataFromTable($tableName)
    {
        $pdo = $this->database->getConnection();
        $statement = $pdo->prepare("SELECT * FROM {$tableName}");
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
}

class DataRenderer
{
    private $templatePath;

    public function __construct($templatePath)
    {
        $this->templatePath = $templatePath;
    }

    public function render($templateName, $data)
    {
        $templateFile = $this->templatePath . '/' . $templateName;
    }
}

$database = new DatabaseConnection('localhost', 'root', '', 'wordpress');
$query = new DataQuery($database);
$data = $query->getDataFromTable('wp_posts');

$renderer = new DataRenderer('/templates');
$renderer->render('template.twig', $data);
