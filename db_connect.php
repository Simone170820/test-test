<?php
// Dati di connessione
$host = 'localhost';
$dbname = 'educorp';
$username = 'root';  // Username di MySQL
$password = '';      // Password di MySQL

// Connessione al database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Imposta l'errore di gestione delle eccezioni
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Errore di connessione: " . $e->getMessage();
    exit;
}
?>
