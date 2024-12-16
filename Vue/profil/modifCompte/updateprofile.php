<?php
session_start();

//nous vire si on est pas connecté
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = htmlspecialchars($_POST['username']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $age = intval($_POST['age']);
    $mail = htmlspecialchars($_POST['mail']);

    include_once('../../bdd.php');
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE compte SET 
        pseudo='" . $username . "',
        prenom='" . $prenom . "',
        nom='" . $nom . "',
        age=" . $age . ",
        mail='" . $mail . "'
        WHERE pseudo='" . $username . "';";

    if ($stmt = $pdo->prepare($sql)) {  

        if ($stmt->execute()) {
            $_SESSION['username'] = $username;
            $_SESSION['prenom'] = $prenom;
            $_SESSION['nom'] = $nom;
            $_SESSION['age'] = $age;
            $_SESSION['mail'] = $mail;

            header("Location: profile"); 
            exit();
        } else {
            echo "Erreur lors de la mise à jour des informations.";
        }

        $stmt->close();
    } else {
        echo "erreur";
    }

    $conn->close();
}
?>
