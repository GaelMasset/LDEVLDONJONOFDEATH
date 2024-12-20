<?php
session_start();


try {
    $pdo = new PDO($dsn, $user, $pass);

    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $cheminImage = $_POST['cheminImage'];

    if(isset($_POST['choixTypeItem'])){
        $sql = "select idType from ItemType where Label = :label";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['label' => $_POST['choixTypeItem']]);
    }
    $type = $stmt->fetch(PDO::FETCH_ASSOC);

    if($_POST['modifie'] != "/"){
        $sql = "UPDATE Items set id = :id, item_name = :name, description = :description, cheminImage = :cheminImage, type = :type where id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id, 'name' => $name, 'description' => $description, 'cheminImage' => $cheminImage, 'type' => $type['idType']]);

        header('Location: panelAdmin');
        exit();
    }
    else{
    //verifier que personne a deja le id
    $sql = "SELECT * FROM Items WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    if ($stmt->rowCount() > 0) {
        header('Location: panelAdmin');
        exit();
    }
    
    $sql = "INSERT INTO Items (id, item_name, description, cheminImage, type) VALUES (:id, :name, :description, :cheminImage, :type)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id, 'name' => $name, 'description' => $description, 'cheminImage' => $cheminImage, 'type' => $type['idType']]);
    }
    header('Location: panelAdmin');
    exit();
}
catch (Exception $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>