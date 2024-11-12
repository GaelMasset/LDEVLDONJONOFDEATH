<?php
include_once('../bdd.php'); 
$pdo = new PDO($dsn, $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT pseudo, dateInscription, prenom FROM compte";
$stmt = $pdo->prepare($sql);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Pseudo</th>';
    echo '<th>Date d\'inscription</th>';
    echo '<th>Prénom</th>';
    echo '<th>Actions</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $date_inscription = new DateTime($row['dateInscription']);
        $formatted_date = $date_inscription->format('Y-m-d H:i:s');

        echo '<tr>';
        echo '<td>' . $row['pseudo'] . '</td>';
        echo '<td>' . $formatted_date . '</td>';
        echo '<td>' . $row['prenom'] . '</td>';
        echo '<td><a href="gestionJoueurs/supprimerJoueur.php?pseudo=' . $row['pseudo'] . '" class="btn-supprimer">Supprimer</a></td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo "<p>Aucun utilisateur trouvé.</p>";
}
?>
