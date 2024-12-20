<?php
session_start();


try {
    $pdo = new PDO($dsn, $user, $pass);

    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $cheminImage = $_POST['cheminImage'];

    //verifier que personne a deja le id
    $sql = "SELECT * FROM Items WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    if ($stmt->rowCount() > 0) {
        header('Location: panelAdmin');
        exit();
    }
    
    $sql = "INSERT INTO Items (id, item_name, description, cheminImage) VALUES (:id, :name, :description, :cheminImage)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id, 'name' => $name, 'description' => $description, 'cheminImage' => $cheminImage]);

    header('Location: panelAdmin');
    exit();

}catch (Exception $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>