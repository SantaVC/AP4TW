# AP4TW

Abyste mohl rychle zkontrolovat, můžete okamžitě vytvořit databázi na místním serveru, kód níže.

CREATE DATABASE newDB;

USE newDB;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    phone VARCHAR(20),
    password VARCHAR(255) NOT NULL
);
