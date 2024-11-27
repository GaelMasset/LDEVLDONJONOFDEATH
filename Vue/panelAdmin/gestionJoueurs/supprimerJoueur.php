<?php
if (isset($_GET['pseudo'])) {
    $pseudo = $_GET['pseudo'];

    try {
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM compte WHERE pseudo = :pseudo";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $stmt->execute();

        header("Location: panelAdmin.php");
        exit;

    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo "Aucun pseudo spécifié.";
}
?>
