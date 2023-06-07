CREATE DATABASE mijn_database;

USE mijn_database;

CREATE TABLE gebruikers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    gebruikersnaam VARCHAR(50) NOT NULL,
    wachtwoord VARCHAR(255) NOT NULL
);
