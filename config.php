<?php
$servername = "localhost";
$username = "root"; // Modifica con il tuo nome utente
$password = ""; // Modifica con la tua password
$dbname = "nome_database"; // Modifica con il nome del tuo database

// Crea connessione
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Controlla la connessione
if (!$conn) {
    die("Connessione fallita: " . mysqli_connect_error());
}
?>
