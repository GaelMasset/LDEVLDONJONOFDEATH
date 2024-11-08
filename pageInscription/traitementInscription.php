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



        $sql = "INSERT INTO compte (pseudo, mdp, dateInscription, prenom, nom, age, mail) VALUES (:username, :password, now(), :prenom, :nom, :age, :mail)";
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute(['username' => $username, 'password' => $password, 'mail' => $mail, 'prenom' => $prenom, 'nom' => $nom, 'age' => $age]);


        $sql = "SELECT * FROM compte WHERE pseudo = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username]);
        $_SESSION['username'] = $stmt->fetchColumn();
        $_SESSION['password'] = $stmt->fetchColumn();
        $_SESSION['date_inscription'] = $stmt->fetchColumn();
        $_SESSION['prenom'] = $stmt->fetchColumn();
        $_SESSION['nom'] = $stmt->fetchColumn();
        $_SESSION['age'] = $stmt->fetchColumn();
        $_SESSION['mail'] = $stmt->fetchColumn();
        $_SESSION['logged_in'] = true;

        header('Location: /LDEVLDONJONOFDEATH/profil/pageProfil.php');
        exit();
        
    } catch (Exception $e) {
        echo "Erreur de connexion : " . $e->getMessage();
    }
}
?>
