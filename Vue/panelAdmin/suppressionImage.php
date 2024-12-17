<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nomImage'])) {
        $image_name = $_POST['nomImage'];
        $image_path = 'images/' . $image_name;

        if (file_exists($image_path)) {
            if (unlink($image_path)) {
                header('Location: panelAdmin');
                exit();
            } else {
                echo "erreur";
            }
        } else {
            echo "existe pas";
        }
    } else {
        echo "pas de fichier";
    }
}
?>
