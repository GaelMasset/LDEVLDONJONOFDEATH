<?php
session_start();
require_once('bdd.php');

try {
    $pdo = new PDO($dsn, $user, $pass);

    $id = $_POST['id'];
    $content = $_POST['content'];

    //verifier que personne a deja le id
    $sql = "SELECT * FROM Chapter WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    if ($stmt->rowCount() > 0) {
        header('Location: panelAdmin');
        exit();
    }
    
    $sql = "INSERT INTO Chapter (id, content) VALUES (:id, :content)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id, 'content' => $content]);

    header('Location: panelAdmin');
    exit();

}catch (Exception $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>