<?php
session_start();

try {
    $pdo = new PDO($dsn, $user, $pass);

    $id = $_POST['id'];
    $name = $_POST['name'];
    $pv = $_POST['pv'];
    $mana = $_POST['mana'];
    $initiative = $_POST['initiative'];
    $strength = $_POST['strength'];
    $attack = $_POST['attack'];
    $loot = $_POST['loot'];
    $xp = $_POST['xp'];
    $nomImage = $_POST['cheminImage'];

    //verifier que personne a deja le id
    $sql = "SELECT * FROM monster WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    if ($stmt->rowCount() > 0) {
        header('Location: panelAdmin');
        exit();
    }
    
    $sql = "INSERT INTO monster (id, name, pv, mana, initiative, strength, attack, loot_id, xp, nomImage) VALUES (:id, :name, :pv, :mana, :initiative, :strength, :attack, :loot, :xp, :nomImage)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id, 'name' => $name, 'pv' => $pv, 'mana' => $mana, 'initiative' => $initiative, 'strength' => $strength, 'attack' => $attack, 'loot' => $loot, 'xp' => $xp, 'nomImage' => $nomImage]);

    header('Location: panelAdmin');
    exit();

}catch (Exception $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>