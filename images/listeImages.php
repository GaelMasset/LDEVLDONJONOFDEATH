<?php
$directory ='images/'; // Utilisation d'un chemin absolu

$files = scandir($directory);

$allowedExts = ['jpg', 'jpeg', 'png', 'gif'];
$imageFiles = [];

foreach ($files as $file) {
    $fileExt = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    if (in_array($fileExt, $allowedExts)) {
        $imageFiles[] = $file;
    }
}

if (empty($imageFiles)) {
    echo "<p>Aucune image trouvée dans le dossier.</p>";
} else {
    echo '<div class="image-list">';
    foreach ($imageFiles as $image) {
        // Utilisation du chemin absolu pour afficher l'image
        echo '<div class="image-item">';
        $cheminVrai = '/'.$image;
        echo '<p>'.$cheminVrai.'</p>';
        echo '<img src="'.$cheminVrai.'>';
        echo '</div>';
    }
    echo '</div>';
}
?>
