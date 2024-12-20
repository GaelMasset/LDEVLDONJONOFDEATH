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
    
echo '<div class="divImages">';

$imageCount = 0;

foreach ($imageFiles as $image) {
    if ($imageCount % 10 == 0) {
        echo '<div class="imageRow">';
    }

    echo '<div class="itemImage">';
    echo '<span style="color:black;">'.$image.'</span><br/>';
    echo'<form action="suppressionImage" method="post">
    <input type="hidden" name="nomImage" value="'.$image.'">
    <button type="submit">Supprimer</button>
    </form>';
    echo '<img src="images/'.$image.'">';
    echo '</div>';

    $imageCount++;

    if ($imageCount % 10 == 0) {
        echo '</div>';
    }
}

if ($imageCount % 10 != 0) {
    echo '</div>';
}

echo '</div>';


}
?>
