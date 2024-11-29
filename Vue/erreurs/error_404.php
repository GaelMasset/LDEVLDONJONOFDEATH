<style>
    <?php require_once "styles/erreur_404.css"; ?>
</style>

<?php $image = 'http://localhost:8088/LDEVLDONJONOFDEATH/images/chevalier.png';
echo $image;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur 404</title>
</head>
<body>
    <?php require_once "header/header.php"; ?>
    <label>ERREUR 404</label>
    <img src="<?php echo $image ?>"/>
</body>
</html>

