<?php
session_start();


try {
    $pdo = new PDO($dsn, $user, $pass);

    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    //verifier que personne a deja le id
    $sql = "SELECT * FROM Items WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    if ($stmt->rowCount() > 0) {
        header('Location: panelAdmin');
        exit();
    }
    
    $sql = "INSERT INTO Items (id, name, description) VALUES (:id, :name, :description)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id, 'name' => $name, 'description' => $description]);

    header('Location: panelAdmin');
    exit();

}catch (Exception $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>