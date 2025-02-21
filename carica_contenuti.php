<?php
session_start();

// Verifica se l'utente è loggato
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file-contenuto'])) {
    // Impostazioni per l'upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file-contenuto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Verifica se il file è un'immagine reale o falsa
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["file-contenuto"]["tmp_name"]);
        if ($check !== false) {
            echo "File è un'immagine - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "Il file non è un'immagine.";
            $uploadOk = 0;
        }
    }

    // Controlla se il file già esiste
    if (file_exists($target_file)) {
        echo "Mi dispiace, il file esiste già.";
        $uploadOk = 0;
    }

    // Limita la dimensione del file
    if ($_FILES["file-contenuto"]["size"] > 500000) {
        echo "Mi dispiace, il tuo file è troppo grande.";
        $uploadOk = 0;
    }

    // Consenti solo determinati formati
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Mi dispiace, solo JPG, JPEG, PNG & GIF sono consentiti.";
        $uploadOk = 0;
    }

    // Se tutto è ok, prova a caricare il file
    if ($uploadOk == 0) {
        echo "Mi dispiace, il tuo file non è stato caricato.";
    } else {
        if (move_uploaded_file($_FILES["file-contenuto"]["tmp_name"], $target_file)) {
            echo "Il file " . htmlspecialchars(basename($_FILES["file-contenuto"]["name"])) . " è stato caricato.";
        } else {
            echo "Mi dispiace, c'è stato un errore nel caricamento del file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carica Contenuti</title>
</head>
<body>
    <h3>Carica Contenuti</h3>
    <form action="carica_contenuti.php" method="POST" enctype="multipart/form-data">
        <label for="file-contenuto">Seleziona File:</label>
        <input type="file" name="file-contenuto" required><br><br>

        <button type="submit" name="submit">Carica</button>
    </form>
</body>
</html>
