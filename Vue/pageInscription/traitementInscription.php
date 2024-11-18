<?php
session_start();
include_once ('../bdd.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {
        $pdo = new PDO($dsn, $user, $pass);

        $username = $_POST['username'];
        $password = $_POST['password'];
        $mail = $_POST['mail'];
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $age = $_POST['age'];

        //verifier que personne a deja le pseudo
        $sql = "SELECT * FROM compte WHERE pseudo = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username]);
        if ($stmt->rowCount() > 0) {
            header('Location: login');
            exit();
        }


        $sql = "INSERT INTO compte (pseudo, mdp, dateInscription, prenom, nom, age, mail) VALUES (:username, :password, now(), :prenom, :nom, :age, :mail)";
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute(['username' => $username, 'password' => $password, 'mail' => $mail, 'prenom' => $prenom, 'nom' => $nom, 'age' => $age]);


        $sql = "SELECT * FROM compte WHERE pseudo = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $_SESSION['username'] = $user['pseudo'];
        $_SESSION['password'] = $user['mdp'];
        $_SESSION['date_inscription'] = $user['dateInscription'];
        $_SESSION['prenom'] = $user['prenom'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['age'] = $user['age'];
        $_SESSION['mail'] = $user['mail'];
        $_SESSION['logged_in'] = true;
        $_SESSION['isAdmin'] = $user['isAdmin'];

        header('Location: profile');
        exit();
        
    } catch (Exception $e) {
        echo "Erreur de connexion : " . $e->getMessage();
    }
}
?>
