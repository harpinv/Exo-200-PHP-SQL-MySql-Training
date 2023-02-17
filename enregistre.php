<?php
if(isset($_POST['name']) && $_POST['difficulty'] && $_POST['distance'] && $_POST['duration'] && $_POST['height_difference'] && $_POST['available']) {
    if($_POST['distance'] > 0 && $_POST['distance'] < 50 && $_POST['height_difference'] > 0 && $_POST['height_difference'] < 1000) {
        if(strlen($_POST['name']) < 100) {
             function sanitize($data) {
                 $data = trim($data);
                 $data = stripslashes($data);
                 $data = htmlspecialchars($data);
                 $data = addslashes($data);
                 return $data;
             }

            $server = 'localhost';
            $user = 'root';
            $pwd = '';
            $db = 'liste_randonnée';

            try {
                $connect = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pwd);

                $name = sanitize($_POST['name']);
                $difficulty = sanitize($_POST['difficulty']);
                $distance = sanitize($_POST['distance']);
                $duration = sanitize($_POST['duration']);
                $difference = sanitize($_POST['height_difference']);
                $available = sanitize($_POST['available']);

                $ajoute = $connect->prepare("
                    INSERT INTO hiking (name, difficulty, distance, duration, height_difference, available)
                    VALUES (:name, :difficulty, :distance, :duration, :height_difference, :available)
                ");

                $ajoute->bindParam(':name', $name);
                $ajoute->bindParam(':difficulty', $difficulty);
                $ajoute->bindParam(':distance', $distance);
                $ajoute->bindParam(':duration', $duration);
                $ajoute->bindParam(':height_difference', $difference);
                $ajoute->bindParam(':available', $available);

                $ajoute->execute();

                echo "La randonnée a été ajoutée avec succès.";
            }
            catch (PDOException $exception) {
                echo "Erreur de connexion: " . $exception->getMessage();
            }
        } else {
            echo "Erreur: la chaine de caractère 'name' est trop longue";
        }
    } else {
        echo "Erreur: une des valeurs numérique est invalide";
    }
} else {
    echo "Erreur: une des valeurs est manquante";
}