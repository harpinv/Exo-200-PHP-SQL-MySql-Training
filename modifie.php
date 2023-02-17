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

                $id = $_POST['identife'];
                $name = sanitize($_POST['name']);
                $difficulty = sanitize($_POST['difficulty']);
                $distance = sanitize($_POST['distance']);
                $duration = sanitize($_POST['duration']);
                $difference = sanitize($_POST['height_difference']);
                $available = sanitize($_POST['available']);

                $remplace = $connect->prepare("
                    UPDATE hiking SET name = :name, difficulty = :difficulty, distance = :distance, duration = :duration, height_difference = :height_difference, available = :available WHERE id = :id
                ");

                $remplace->bindParam(':id', $id);
                $remplace->bindParam(':name', $name);
                $remplace->bindParam(':difficulty', $difficulty);
                $remplace->bindParam(':distance', $distance);
                $remplace->bindParam(':duration', $duration);
                $remplace->bindParam(':height_difference', $difference);
                $remplace->bindParam(':available', $available);

                $remplace->execute();

                echo "La randonnée a été modifié avec succès.";
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