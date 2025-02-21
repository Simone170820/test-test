<?php
// Connessione al database
include('db_connect.php'); // Assicurati che questo file contenga la connessione al tuo database

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query per eliminare l'utente
    $sql = "DELETE FROM utenti WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        echo "Utente eliminato con successo!";
        // Redirigi a una pagina (ad esempio, la pagina di gestione utenti)
        header("Location: gestione_utenti.php");
        exit();
    } else {
        echo "Errore: " . mysqli_error($conn);
    }
}
?>
