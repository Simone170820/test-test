<?php
// Includi la connessione al database
include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ottieni i dati inviati dal modulo
    $titolo = $_POST['titolo'];
    $descrizione = $_POST['descrizione'];
    $link_sito = $_POST['link_sito'];
    $link_facebook = $_POST['link_facebook'];
    $link_linkedin = $_POST['link_linkedin'];
    $sede_operativa = $_POST['sede_operativa'];
    $sede_legale = $_POST['sede_legale'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    // Prepara la query per aggiornare i dati nel database
    $sql = "UPDATE informazioni_sito SET 
            titolo = :titolo, 
            descrizione = :descrizione, 
            link_sito = :link_sito, 
            link_facebook = :link_facebook, 
            link_linkedin = :link_linkedin, 
            sede_operativa = :sede_operativa, 
            sede_legale = :sede_legale, 
            email = :email, 
            telefono = :telefono 
            WHERE id = 1";  // Supponiamo che ci sia un solo record

    // Prepara l'istruzione
    $stmt = $pdo->prepare($sql);

    // Esegui l'aggiornamento
    $stmt->execute([
        ':titolo' => $titolo,
        ':descrizione' => $descrizione,
        ':link_sito' => $link_sito,
        ':link_facebook' => $link_facebook,
        ':link_linkedin' => $link_linkedin,
        ':sede_operativa' => $sede_operativa,
        ':sede_legale' => $sede_legale,
        ':email' => $email,
        ':telefono' => $telefono
    ]);

    // Reindirizza l'utente alla pagina di modifica con un messaggio di successo
    header("Location: modifica_il_sito.html?success=true");
    exit;
}
?>
