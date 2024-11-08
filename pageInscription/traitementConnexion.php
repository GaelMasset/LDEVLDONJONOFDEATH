<?php
session_start();
include_once('../bdd.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try { //try car sinon bug
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Pour gérer les erreurs

        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT mdp FROM compte WHERE pseudo = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username]);

        if ($stmt->rowCount() > 0) {
            $vraiPassword = $stmt->fetchColumn();

            if ($password == $vraiPassword) {

                $sql = "SELECT * FROM compte WHERE pseudo = :username";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['username' => $username]);
                //le mot de passe est correct, on connecte l'utilisateur
                $_SESSION['username'] = $stmt->fetchColumn();
                $_SESSION['password'] = $stmt->fetchColumn();
                $_SESSION['date_inscription'] = $stmt->fetchColumn();
                $_SESSION['prenom'] = $stmt->fetchColumn();
                $_SESSION['nom'] = $stmt->fetchColumn();
                $_SESSION['age'] = $stmt->fetchColumn();
                $_SESSION['mail'] = $stmt->fetchColumn();
                $_SESSION['logged_in'] = true;

                //redirection vers index.php
                header('Location: /LDEVLDONJONOFDEATH/profil/pageProfil.php');
                exit();
            } else {
                echo "Mot de passe incorrect.";
            }
        } else {
            echo "Cet utilisateur n'existe pas.";
        }
    } catch (PDOException $e) {
    }
}
