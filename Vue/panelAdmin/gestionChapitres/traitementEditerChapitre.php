<?php
session_start();
require_once('bdd.php');

try {
    $pdo = new PDO($dsn, $user, $pass);

    $content = $_POST['content'];
    $id = $_POST['id'];
    
    $sql = "UPDATE Chapter set content = :contenu where id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['contenu' => $content, 'id' => $id]);

    header('Location: panelAdmin');
    exit();

}catch (Exception $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>