<?php
session_start();
include_once ('../../../bdd.php');


try {
    $pdo = new PDO($dsn, $user, $pass);

    $id = $_POST['id'];
    $name = $_POST['name'];
    $pv = $_POST['pv'];
    $mana = $_POST['mana'];
    $initiative = $_POST['initiative'];
    $strength = $_POST['strength'];
    $attack = $_POST['attack'];
    $xp = $_POST['xp'];

    //verifier que personne a deja le id
    $sql = "SELECT * FROM monster WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    if ($stmt->rowCount() > 0) {
        header('Location: /LDEVLDONJONOFDEATH/panelAdmin/panelAdmin.php');
        exit();
    }
    
    $sql = "INSERT INTO monster (id, name, pv, mana, initiative, strength, attack, xp) VALUES (:id, :name, :pv, :mana, :initiative, :strength, :attack, :xp)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id, 'name' => $name, 'pv' => $pv, 'mana' => $mana, 'initiative' => $initiative, 'strength' => $strength, 'attack' => $attack, 'xp' => $xp]);

    header('Location: /LDEVLDONJONOFDEATH/panelAdmin/panelAdmin.php');
    exit();

}catch (Exception $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>