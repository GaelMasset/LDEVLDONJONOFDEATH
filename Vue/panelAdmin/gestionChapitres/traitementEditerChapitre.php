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

    $sql = "DELETE from links where chapter_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);

    echo $_POST['choixChapitre1'] . "     " . $_POST['choixChapitre1'];
    if($_POST['choixChapitre1'] != "/"){
        $sql = "INSERT into links (chapter_id, next_chapter_id, description) values (:nouveauId, :next_id, :description)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['nouveauId' => $id, 'next_id' => $_POST['choixChapitre1'], 'description' => $_POST['desclien1']]);
    }

    echo $_POST['choixChapitre2'] . "     " . $_POST['choixChapitre2'];
    if($_POST['choixChapitre2'] != "/"){
        $sql = "INSERT into links (chapter_id, next_chapter_id, description) values (:nouveauId, :next_id, :description)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['nouveauId' => $id, 'next_id' => $_POST['choixChapitre2'], 'description' => $_POST['desclien2']]);
    }

    echo $_POST['choixChapitre3'] . "     " . $_POST['choixChapitre3'];
    if($_POST['choixChapitre3'] != "/"){
        $sql = "INSERT into links (chapter_id, next_chapter_id, description) values (:nouveauId, :next_id, :description)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['nouveauId' => $id, 'next_id' => $_POST['choixChapitre3'], 'description' => $_POST['desclien3']]);
    }


    header('Location: panelAdmin');
    exit();

}catch (Exception $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>