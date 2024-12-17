<?php
$directory ='images/';
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
    
echo '<div class="divImages">'; // Div principale qui contiendra toutes les images

$imageCount = 0; // Compteur d'images

foreach ($imageFiles as $image) {
    // Quand 4 images sont affichées, on ouvre une nouvelle ligne
    if ($imageCount % 10 == 0) {
        // Ouvre une nouvelle ligne toutes les 4 images
        echo '<div class="imageRow">';
    }

    // Affiche l'image
    echo '<div class="itemImage">';
    echo '<p style="color:black;">'.$image.'</p>';
    echo '<img src="images/'.$image.'">';
    echo '</div>';

    // Incrémente le compteur
    $imageCount++;

    // Quand 4 images sont affichées, on ferme la ligne
    if ($imageCount % 10 == 0) {
        echo '</div>'; // Fermeture de la div "imageRow"
    }
}

// Si le nombre d'images n'est pas un multiple de 4, on ferme la dernière ligne
if ($imageCount % 10 != 0) {
    echo '</div>';
}

echo '</div>'; // Fermeture de la div principale


}
?>
