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

                //redirection vers index.php
                header('Location: profile');
                exit();
            } else {
                header('Location: login');
            exit();
            }
        } else {
            header('Location: login');
            exit();
        }
    } catch (PDOException $e) {
    }
}
