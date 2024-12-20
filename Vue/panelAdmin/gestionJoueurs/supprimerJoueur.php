<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pseudo'])) {
    $pseudo = $_POST['pseudo'];

    try {
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM compte WHERE mail = :pseudo";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $stmt->execute();

        header("Location: panelAdmin");
        exit;

    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo "Aucun pseudo spécifié.";
}
?>
