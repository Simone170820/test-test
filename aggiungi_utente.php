<?php
// Connessione al database
include('db_connect.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Debug: Verifica cosa viene inviato nel form
    var_dump($_POST);

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $ruolo = $_POST['ruolo'];

    // Verifica che le password corrispondano
    if ($password !== $password_confirm) {
        echo "Le password non corrispondono!";
        exit;
    }

    // Crittografa la password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Prepara la query di inserimento
    $sql = "INSERT INTO utenti (nome, email, password, ruolo) VALUES ('$nome', '$email', '$password_hash', '$ruolo')";

    if (mysqli_query($conn, $sql)) {
        echo "Utente aggiunto con successo!";
    } else {
        echo "Errore: " . mysqli_error($conn);
    }
}
?>
