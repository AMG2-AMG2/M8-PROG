<?php

class DBConnection {
    private $host = 'localhost'; // De hostnaam van de database
    private $gebruiker = 'root'; // Gebruikersnaam voor de database
    private $wachtwoord = ''; // Wachtwoord voor de database
    private $database = 'mijn_databasse'; // Naam van de database

    public function connect() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->database}";
            $verbinding = new PDO($dsn, $this->gebruiker, $this->wachtwoord);
            $verbinding->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $verbinding;
        } catch (PDOException $e) {
            echo 'Databasefout: ' . $e->getMessage();
            exit();
        }
    }
}
