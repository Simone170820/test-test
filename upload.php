<?php
session_start();

// Verifica se l'utente è loggato
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');  // Reindirizza alla pagina di login se non loggato
    exit;
}

// Gestione del caricamento dell'immagine
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    // Controllo se l'immagine è un file valido (esempio di controllo basico)
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        // Se è un'immagine, prosegui con il caricamento
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "Immagine caricata con successo!";
        } else {
            echo "Errore nel caricamento dell'immagine.";
        }
    } else {
        echo "Il file caricato non è un'immagine.";
    }
}
?>

<!-- Form di caricamento immagini -->
<form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="image" required>
    <button type="submit">Carica Immagine</button>
</form>
