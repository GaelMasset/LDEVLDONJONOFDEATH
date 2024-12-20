<?php
include '../bdd.php';

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
    <table class="table-monstres">
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
                <a href="modifMonstre.php?id=' . $monstre['id'] . '">Modifier</a> | 
                <a href="suppriMonstre.php?id=' . $monstre['id'] . '">Supprimer</a>
            </td>
        </tr>';
}

echo '<tr class="ligneAjoutMonstre">
            <td colspan="10">
                <a href="gestionMonstres/ajouterMonstre/ajouterMonstre.php" class="ajouterMonstreTxt">Ajouter un monstre</a>
            </td>
        </tr>';

echo '</tbody></table>';
?>

<style>
    .table-monstres {
        width: 100%;
        margin-top: 0px;
    }

    .table-monstres th, .table-monstres td {
        padding: 4px;
        padding-top: 2px;
        padding-bottom: 2px;
        text-align: center;
        border: 1px solid #ddd;
    }

    .table-monstres th {
        background-color: white;
    }

    .ligneAjoutMonstre {
        background-color: #f9f9f9;
        border-top: 2px solid #ddd;
        position: sticky;
        bottom: 0;
        left: 0;
    }

    .ajouterMonstreTxt {
        color: black;
        text-decoration: none;
        font-size: 16px;
        font-weight: bold;
    }


   
</style>
