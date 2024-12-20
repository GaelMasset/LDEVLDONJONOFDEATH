<?php
class BerserkerController {
    public function index() {
        $imagePath = 'images/Berserker.jpg';

        if (file_exists($imagePath)) {
            // Vérification si le fichier est accessible
            if (is_readable($imagePath)) {
                // Définir les en-têtes pour envoyer une image JPEG
                header('Content-Type: image/jpeg');
                header('Content-Length: ' . filesize($imagePath));
                
                // Lire et envoyer le contenu de l'image
                readfile($imagePath);
                exit;
            } else {
                echo 'Le fichier n\'est pas lisible.';
            }
        } else {
            echo 'Image non trouvée.';
        }
    }
}
