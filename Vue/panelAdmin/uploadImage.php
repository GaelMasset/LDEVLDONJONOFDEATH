<?php
if (isset($_POST['submit'])) {
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        
        $fileName = $_FILES['image']['name'];
        $fileTmpName = $_FILES['image']['tmp_name'];
        $fileSize = $_FILES['image']['size'];
        $fileError = $_FILES['image']['error'];
        $fileType = $_FILES['image']['type'];

        $customFileName = $_POST['filename'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        //si on a pas mis de nom
        if (empty($customFileName)) {
            $customFileName = 'image_' . time();
        }

        $uploadDirectory = 'images/';

        $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($fileExt, $allowedExts)) {
            if ($fileSize < 2000000) {
                $newFileName = $customFileName . '.' . $fileExt;

                $fileDestination = $uploadDirectory . $newFileName;

                if (file_exists($fileDestination)) {
                    echo "choisir un autre nom";
                } else {
                    if (move_uploaded_file($fileTmpName, $fileDestination)) {
                        echo "succes";
                    } else {
                        echo "erreur";
                    }
                }
            } else {
                echo "taille trop grosse";
            }
        } else {
            echo "mauvais type :(";
        }
    } else {
        echo "what";
    }
}
?>
