<?php
session_start();


try {
    $pdo = new PDO($dsn, $user, $pass);

    $id = $_POST['id'];

    $sql = "SELECT * from links where id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $lien = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $sql = "UPDATE hero set current_chapter=:chapitre where idCompte=:compte";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['chapitre' => $lien['next_chapter_id'], 'compte' => $_SESSION['id']]);

    header('Location: aventure');
    exit();

}catch (Exception $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>