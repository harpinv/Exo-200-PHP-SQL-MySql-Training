<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/basics.css">
    <title>Randonnées, ajout</title>
</head>
<body>
<h1>Modifié une randonnée</h1>

<?php

       $server = 'localhost';
       $user = 'root';
       $pwd = '';
       $db = 'liste_randonnée';

       try {
           $connect = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pwd);

           $randonne = $connect->prepare("
               SELECT id, name, difficulty, distance, duration, height_difference, available FROM hiking
           ");

           $liste = $randonne->execute();

           if($liste) {
               foreach ($randonne->fetchAll() as $user) {
                   if ($user['id'] == $_POST['valeur']) {
                       echo "                     
                       <form action='modifie.php' method='post'>
                           <input type='number' name='identife' id='identife' value='" . $_POST['valeur'] . "' style='display: none'>
                           <div>
                               <label for='name'>name:</label>
                               <input type='text' name='name' placeholder='Nom de la randonnée' id='name' value='" . $user['name'] . "'>
                           </div>
                           <div>
                               <label for='difficulty'>Difficulty:</label>
                               <select name='difficulty' id='difficulty'>
                                   <option value='très facile'>Très facile</option>
                                   <option value='facile'>Facile</option>
                                   <option value='moyen'>Moyen</option>
                                   <option value='difficile'>Difficile</option>
                                   <option value='très difficile'>Très difficile</option>
                               </select>
                           </div>
                           <div>
                               <label for='distance'>Distance:</label>
                               <input type='text' name='distance' placeholder='Distance en kilomètre' id='distance' value='" . $user['distance'] . "'>
                           </div>
                           <div>
                               <label for='duration'>Duration:</label>
                               <input type='time' name='duration' id='duration' value='" . $user['duration'] . "'>
                           </div>
                           <div>
                               <label for='height_difference'>Height_difference:</label>
                               <input type='number' name='height_difference' placeholder='Dénivelé en mètre' id='height_difference' value='" . $user['height_difference'] . "'>
                           </div>
                           <div>
                               <label for='available'>Available:</label>
                               <input type='date' name='available' id='available' value='" . $user['available'] . "'>
                           </div>
                           <div>
                               <input type='submit' name='submit' value='enregistrer'>
                           </div>
                       </form>";
                   }
               }
           }
       }
       catch (PDOException $exception) {
           echo "Erreur de connexion: " . $exception->getMessage();
       }
?>

</body>
</html>
