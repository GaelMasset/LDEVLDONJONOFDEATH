<?php
include_once(__DIR__ . '/../../../bdd.php'); 

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

$query = "SELECT * FROM monster";
$stmt = $pdo->query($query);
$monstres = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '
    <table class="table-ordonnee">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>PV</th>
                <th>Mana</th>
                <th>Initiative</th>
                <th>Strenght</th>
                <th>Attack</th>
                <th>Loot_Id</th>
                <th>XP</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>';

foreach ($monstres as $monstre) {
    echo '<tr>
            <td>' . $monstre['id'] . '</td>
            <td>' . $monstre['name'] . '</td>
            <td>' . $monstre['pv'] . '</td>
            <td>' . $monstre['mana'] . '</td>
            <td>' . $monstre['initiative'] . '</td>
            <td>' . $monstre['strength'] . '</td>
            <td>' . $monstre['attack'] . '</td>
            <td>' . $monstre['loot_id'] . '</td>
            <td>' . $monstre['xp'] . '</td>
            <td>
                <a href="suppriMonstre.php?id=' . $monstre['id'] . '">Supprimer</a>
            </td>
        </tr>';
}

echo '<tr class="ligneAjout">
            <td colspan="10">
                <a href="ajouterMonstre" class="ajouterTxt">Ajouter un monstre</a>
            </td>
        </tr>';

echo '</tbody></table>';
?>


