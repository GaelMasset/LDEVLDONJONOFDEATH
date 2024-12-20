<?php
session_start();


try {
    $pdo = new PDO($dsn, $user, $pass);

    $id = $_POST['id'];
    $name = $_POST['name'];
    $idItem = $_POST['idItem'];
    $qtt = $_POST['qtt'];

    //verifier que personne a deja le id
    $sql = "SELECT * FROM Loot WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    if ($stmt->rowCount() > 0) {
        header('Location: panelAdmin');
        exit();
    }
    
    $sql = "INSERT INTO Loot (id, name, item_id, quantity) VALUES (:id, :name, :item_id, :quantity)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id, 'name' => $name, 'item_id' => $idItem, 'quantity' => $qtt]);

    header('Location: panelAdmin');
    exit();

}catch (Exception $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>