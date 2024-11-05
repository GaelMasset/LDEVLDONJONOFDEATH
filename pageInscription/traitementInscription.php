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

        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['mail'] = $mail;
        $_SESSION['prenom'] = $prenom;
        $_SESSION['nom'] = $nom;
        $_SESSION['age'] = $age;
        $_SESSION['logged_in'] = true;

        header('Location: /LDEVLDONJONOFDEATH/profil/pageProfil.php');
        exit();
        
    } catch (Exception $e) {
        echo "Erreur de connexion : " . $e->getMessage();
    }
}
?>
