<?php
    session_start();
    include 'bdd.php';

    if(!(isset($_POST['classe'])) || !(isset($_POST['nom'])) || !(isset($_POST['background']))){
        echo("<p>Quelque chose s'est mal passé</p>");
    }else{

        $classe = $_POST['classe'];
        $nom = $_POST['nom'];
        $background = $_POST['background'];
        //Pour une raison étrange, le $_SESSION de id est vide mais pas les autres, donc on va faire une requête avec le username pour retrouver l'id
        $username = $_SESSION['username'];
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

            //Récupérer l'id de l'utilisateur
            $sql = "SELECT id from compte where pseudo= :username";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['username' => $username]);

            $idSession = $stmt->fetchColumn();

            $requete = $pdo->prepare("INSERT into hero (id,name, class_id, image, biography, pv, mana, strength, initiative, xp, current_level,  current_chapter, primary_weapon, idCompte) 
                                        values (:id, :nom, :classe, 'Berserker.jpg', :background, 30, 0, 15, 5, 0, 1, 1,2, :idSession)");
            $requete->execute(['id' => $id, 'nom' => $nom, 'classe' => $classe, 'background'=>$background, 'idSession' => $idSession]);

            header('Location: profile');
            exit();
        }catch (PDOException $e) {
            echo $e->getMessage();
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

            //Récupérer l'id de l'utilisateur
            $sql = "SELECT id from compte where pseudo= :username";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['username' => $username]);

            $idSession = $stmt->fetchColumn();

            $requete = $pdo->prepare("INSERT into hero (id,name, class_id, image, biography, pv, mana, strength, initiative, xp, current_level, spell_list,  current_chapter, primary_weapon, idCompte) 
                                        values (:id, :nom ,:classe, 'Magician02.jpg', :background, 10, 30, 5, 10, 0, 1, 'Boule de feu, Soin mineure', 1, 4, :idSession)");
            $requete->execute(['id' => $id, 'nom' => $nom, 'classe' => $classe, 'background'=>$background, 'idSession' => $idSession]);

            header('Location: profile');
            exit();
        }catch (PDOException $e) {
            echo $e->getMessage();
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

            //Récupérer l'id de l'utilisateur
            $sql = "SELECT id from compte where pseudo= :username";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['username' => $username]);

            $idSession = $stmt->fetchColumn();

            $requete = $pdo->prepare("INSERT into hero (id,name, class_id, image, biography, pv, mana, strength, initiative, xp, current_level,  current_chapter, primary_weapon, idCompte) 
                                        values (:id, :nom, :classe, 'Thief.jpg', :background, 20, 0, 10, 20, 0, 1,  1, 3, :idSession)");
            $requete->execute(['id' => $id, 'nom' => $nom, 'classe' => $classe, 'background'=>$background, 'idSession' => $idSession]);

            header('Location: profile');
            exit();
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

?>