<?php
// Connessione al database
include('db_connect.php');

// Query per ottenere tutti gli utenti
$sql = "SELECT * FROM utenti";
$result = mysqli_query($conn, $sql);

echo "<table class='table-auto w-full border-collapse border border-gray-300'>
        <thead>
            <tr>
                <th class='px-4 py-2 border-b'>Nome</th>
                <th class='px-4 py-2 border-b'>Email</th>
                <th class='px-4 py-2 border-b'>Ruolo</th>
                <th class='px-4 py-2 border-b'>Azioni</th>
            </tr>
        </thead>
        <tbody>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td class='px-4 py-2 border-b'>" . $row['nome'] . "</td>
            <td class='px-4 py-2 border-b'>" . $row['email'] . "</td>
            <td class='px-4 py-2 border-b'>" . $row['ruolo'] . "</td>
            <td class='px-4 py-2 border-b text-center'>
                <a href='modifica_utente.php?id=" . $row['id'] . "' class='text-blue-600 hover:text-blue-800'>Modifica</a> |
                <a href='rimuovi_utente.php?id=" . $row['id'] . "' class='text-red-600 hover:text-red-800'>Rimuovi</a>
            </td>
        </tr>";
}

echo "</tbody></table>";
?>
