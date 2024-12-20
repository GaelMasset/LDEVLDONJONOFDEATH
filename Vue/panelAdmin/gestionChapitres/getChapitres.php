<?php
include_once(__DIR__ . '/../../../bdd.php'); 
$pdo = new PDO($dsn, $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM Chapter";
$stmt = $pdo->prepare($sql);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    echo '<table class="table-ordonnee">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Numéro</th>';
    echo '<th>Actions</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';

        echo '<td>';
        echo '<form action="supprimerChapitre" method="POST" onsubmit="return confirm(\'Êtes-vous sûr de vouloir supprimer cet item ?\');">';
        echo '<input type="hidden" name="id" value="' .$row['id']. '">';
        echo '<button type="submit" class="btn-supprimer">Supprimer</button>';
        echo '</form>';
        echo '<form action="editerChapitre" method="POST">';
        echo '<input type="hidden" name="id" value="' .$row['id']. '">';
        echo '<button type="submit" class="btn-supprimer">Modifier</button>';
        echo '</form>';
        echo '</td>';
    
        echo '</tr>';
    }
    
}
echo '<tr class="ligneAjout">
            <td colspan="2">
                <a href="ajouterChapitre" class="ajouterTxt">Ajouter un chapitre</a>
            </td>
        </tr>';

    echo '</tbody>';
    echo '</table>';
?>
