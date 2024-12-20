<?php
include_once(__DIR__ . '/../../../bdd.php'); 

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

$query = "SELECT * FROM Loot";
$stmt = $pdo->query($query);
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '
    <table class="table-ordonnee">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>ID Item lié</th>
                <th>Quantité</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>';

foreach ($items as $item) {
    echo '<tr>
            <td>' . $item['id'] . '</td>
            <td>' . $item['name'] . '</td>
            <td>' . $item['item_id'] . '</td>
            <td>' . $item['quantity'] . '</td>
            <td>';
                echo '<form action="supprimerLoot" method="POST" onsubmit="return confirm(\'Êtes-vous sûr de vouloir supprimer ce loot ?\');">';
                echo '<input type="hidden" name="id" value="' .$item['id']. '">';
                echo '<button type="submit" class="buttonForm">Supprimer</button>';
            echo'</td>
        </tr>';
}

echo '<tr class="ligneAjout">
            <td colspan="10">
                <a href="ajouterLoot" class="ajouterTxt">Ajouter un loot</a>
            </td>
        </tr>';

echo '</tbody></table>';
?>