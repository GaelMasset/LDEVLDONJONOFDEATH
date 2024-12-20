<?php
include_once(__DIR__ . '/../../../bdd.php'); 
$pdo = new PDO($dsn, $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM Items join ItemType on Items.type = ItemType.idType";
$stmt = $pdo->prepare($sql);
$stmt->execute();


if ($stmt->rowCount() > 0) {
    echo '<table class="table-ordonnee">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Nom</th>';
    echo '<th>Description</th>';
    echo '<th>Chemin De L\'image</th>';
    echo '<th>Type d\'item</th>';
    echo '<th>Actions</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['item_name'] . '</td>';        
        echo '<td>' . $row['description'] . '</td>';
        echo '<td>' . $row['cheminImage'] . '</td>';
        echo '<td>' . $row['Label'] . '</td>';

        echo '<td>';
        echo '<form action="ajouterItem" method="POST">';
        echo '<input type="hidden" name="id" value="' .$row['id']. '">';
        echo '<input type="hidden" name="item_name" value="' .$row['item_name']. '">';
        echo '<input type="hidden" name="description" value="' .$row['description']. '">';
        echo '<input type="hidden" name="cheminImage" value="' .$row['cheminImage']. '">';
        echo '<input type="hidden" name="Label" value="' .$row['Label']. '">';
        echo '<input type="hidden" name="modifie" value="1">';
        echo '<button type="submit" class="btn-supprimer">Modifier</button>';
        echo '</form>';

        echo '<form action="supprimerItem" method="POST" onsubmit="return confirm(\'Êtes-vous sûr de vouloir supprimer cet item ?\');">';
        echo '<input type="hidden" name="id" value="' .$row['id']. '">';
        echo '<button type="submit" class="btn-supprimer">Supprimer</button>';
        echo '</form>';
        echo '</td>';
    
        echo '</tr>';
    }
    
}
echo '<tr class="ligneAjout">
            <td colspan="6">
                <a href="ajouterItem" class="ajouterTxt">Ajouter un item</a>
            </td>
        </tr>';

    echo '</tbody>';
    echo '</table>';
?>
