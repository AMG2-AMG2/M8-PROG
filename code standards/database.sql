CREATE DATABASE bank_database;

USE bank_database;

CREATE TABLE gebruikers (
    id INT PRIMARY KEY AUTO_INCREMENT,
    naam VARCHAR(100),
    leeftijd INT,
    geslacht VARCHAR(10),
    adres_id INT, 
);

CREATE TABLE adressen (
    id INT PRIMARY KEY AUTO_INCREMENT,
    straat VARCHAR(100),
    huisnummer VARCHAR(10),
    postcode VARCHAR(10),
    plaats VARCHAR(100)
    FOREIGN KEY (gebruiker_id) REFERENCES gebruikers(id)

);

CREATE TABLE rekeningen (
    id INT PRIMARY KEY AUTO_INCREMENT,
    gebruiker_id INT,
    accountnummer VARCHAR(20),
    saldo DECIMAL(10, 2),
    type ENUM('Normaal', 'Plus'),
    FOREIGN KEY (gebruiker_id) REFERENCES gebruikers(id),
    UNIQUE (gebruiker_id, type)
);

INSERT INTO adressen (straat, huisnummer, postcode, plaats)
VALUES ('Bos en Lommerweg', '123', '1234 AB', 'Amsterdam');

INSERT INTO gebruikers (naam, leeftijd, geslacht, adres_id)
VALUES ('Ahmet Asut', 17, 'Man', 1);

INSERT INTO rekeningen (gebruiker_id, accountnummer, saldo, type)
VALUES (1, 'NL12ABCD34567890', 5000.00, 'Normaal');

INSERT INTO rekeningen (gebruiker_id, accountnummer, saldo, type)
VALUES (1, 'NL98EFGH12345678', 2500.00, 'Plus');
