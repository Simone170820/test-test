<?php
session_start();

// Controllo se l'utente è loggato
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Utente</title>
</head>
<body>
    <h1>Benvenuto, <?php echo $username; ?>!</h1>
    <p>Questa è la tua dashboard. Qui puoi gestire il sito.</p>
    <a href="logout.php">Esci</a>
</body>
</html>
