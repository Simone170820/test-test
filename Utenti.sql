CREATE TABLE utenti (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    ruolo ENUM('admin', 'utente') NOT NULL,
    reg_date TIMESTAMP
);
SELECT * FROM utenti;
