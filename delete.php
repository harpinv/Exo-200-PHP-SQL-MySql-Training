<?php
    $server = 'localhost';
    $user = 'root';
    $pwd = '';
    $db = 'liste_randonnée';

    try {
        $connect = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pwd);

        $id = $_POST['valeur'];

        $efface = "DELETE FROM hiking WHERE id = $id";

        if($connect->exec($efface) !== false){
            echo "Une randonnée a bien été supprimé";
        }
    }
    catch (PDOException $exception) {
        echo "Erreur de connexion: " . $exception->getMessage();
    }

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'read.php';
header("Location: http://$host$uri/$extra");
exit;