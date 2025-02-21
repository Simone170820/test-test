<?php
// Includi la connessione al database
include('db_connect.php');

// Recupera i dati dal database
$sql = "SELECT * FROM informazioni_sito WHERE id = 1";  // Supponiamo che ci sia un solo record
$stmt = $pdo->prepare($sql);
$stmt->execute();
$info = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifica il Sito - Educorp</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
</head>
<body class="bg-gray-100">
    <div class="flex justify-center mt-4">
        <div class="bg-white rounded-lg shadow-lg p-4 w-80">
            <h1 class="text-center text-2xl font-bold mb-4">Modifica Informazioni</h1>
            <form action="salva_modifiche.php" method="post">
                <label for="titolo" class="block text-sm font-medium text-gray-700">Titolo Sito</label>
                <input type="text" id="titolo" name="titolo" class="w-full p-3 mb-4 border border-gray-300 rounded" value="<?php echo $info['titolo']; ?>" required>

                <label for="descrizione" class="block text-sm font-medium text-gray-700">Descrizione</label>
                <textarea id="descrizione" name="descrizione" class="w-full p-3 mb-4 border border-gray-300 rounded" required><?php echo $info['descrizione']; ?></textarea>

                <label for="link_sito" class="block text-sm font-medium text-gray-700">Link Sito</label>
                <input type="url" id="link_sito" name="link_sito" class="w-full p-3 mb-4 border border-gray-300 rounded" value="<?php echo $info['link_sito']; ?>" required>

                <label for="link_facebook" class="block text-sm font-medium text-gray-700">Link Facebook</label>
                <input type="url" id="link_facebook" name="link_facebook" class="w-full p-3 mb-4 border border-gray-300 rounded" value="<?php echo $info['link_facebook']; ?>">

                <label for="link_linkedin" class="block text-sm font-medium text-gray-700">Link LinkedIn</label>
                <input type="url" id="link_linkedin" name="link_linkedin" class="w-full p-3 mb-4 border border-gray-300 rounded" value="<?php echo $info['link_linkedin']; ?>">

                <label for="sede_operativa" class="block text-sm font-medium text-gray-700">Sede Operativa</label>
                <input type="text" id="sede_operativa" name="sede_operativa" class="w-full p-3 mb-4 border border-gray-300 rounded" value="<?php echo $info['sede_operativa']; ?>" required>

                <label for="sede_legale" class="block text-sm font-medium text-gray-700">Sede Legale</label>
                <input type="text" id="sede_legale" name="sede_legale" class="w-full p-3 mb-4 border border-gray-300 rounded" value="<?php echo $info['sede_legale']; ?>" required>

                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full p-3 mb-4 border border-gray-300 rounded" value="<?php echo $info['email']; ?>" required>

                <label for="telefono" class="block text-sm font-medium text-gray-700">Telefono</label>
                <input type="tel" id="telefono" name="telefono" class="w-full p-3 mb-4 border border-gray-300 rounded" value="<?php echo $info['telefono']; ?>" required>

                <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-500">Salva Modifiche</button>
            </form>
        </div>
    </div>
</body>
</html>
