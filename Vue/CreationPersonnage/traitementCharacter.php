<?php
    session_start();
    include 'bdd.php';
    

    if(!(isset($_POST['classe'])) || !(isset($_POST['nom'])) || !(isset($_POST['background']))){
        echo("<p>Quelque chose s'est mal passé</p>");
    }else{

        $classe = $_POST['classe'];
        $nom = $_POST['nom'];
        $background = $_POST['background'];
    }

    if($classe==1){
        try{
            $pdo = new PDO($dsn, $user, $pass);

            // Récupérer le nombre de gens pour l'id
            $sql = "SELECT count(*) FROM hero";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            // Récupérer le résultat et le stocker dans une variable
            $id = $stmt->fetchColumn() + 1;

            $requete = $pdo->prepare("INSERT into hero (id,name, image, biography, pv, mana, strength, initiative, xp, current_level,  current_chapter, primary_weapon) 
                                        values (:id, :nom, :classe, 'images/Berserker.jpg', :background, 30, 0, 15, 5, 0, 1, 1,2)");
            $requete->execute(['id' => $id, 'nom' => $nom, 'classe' => $classe, 'background'=>$background]);

            header('Location: profile');
            exit();
        }catch (PDOException $e) {
        }
    }

    if($classe==3){
        try{
            $pdo = new PDO($dsn, $user, $pass);

            // Récupérer le nombre de gens pour l'id
            $sql = "SELECT count(*) FROM hero";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            // Récupérer le résultat et le stocker dans une variable
            $id = $stmt->fetchColumn() + 1;

            $requete = $pdo->prepare("INSERT into hero (id,name, image, biography, pv, mana, strength, initiative, xp, current_level, spell_list,  current_chapter, primary_weapon) 
                                        values (:id, :nom ,:classe, 'images/Magician02.jpg', :background, 10, 30, 5, 10, 0, 1, 'Boule de feu, Soin mineure', 1, 4)");
            $requete->execute(['id' => $id, 'nom' => $nom, 'classe' => $classe, 'background'=>$background]);

            header('Location: profile');
            exit();
        }catch (PDOException $e) {
        }
    }

    if($classe==2){
        try{
            $pdo = new PDO($dsn, $user, $pass);

            // Récupérer le nombre de gens pour l'id
            $sql = "SELECT count(*) FROM hero";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            // Récupérer le résultat et le stocker dans une variable
            $id = $stmt->fetchColumn() + 1;

            $requete = $pdo->prepare("INSERT into hero (id,name, image, biography, pv, mana, strength, initiative, xp, current_level,  current_chapter, primary_weapon) 
                                        values (:id, :nom, :classe, 'images/Thief.jpg', :background, 20, 0, 10, 20, 0, 1,  1, 3)");
            $requete->execute(['id' => $id, 'nom' => $nom, 'classe' => $classe, 'background'=>$background]);

            header('Location: profile');
            exit();
        }catch (PDOException $e) {
        }
    }

?>