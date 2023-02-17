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
   <table>
       <tr>
           <th>name</th>
           <th>difficulty</th>
           <th>distance</th>
           <th>duration</th>
           <th>height_difference</th>
           <th>available</th>
           <th></th>
           <th></th>
       </tr>
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
               foreach ($randonne->fetchAll() as $value) {
                   echo "<tr>
                             <td>" . $value['name'] . "</td>
                             <td>" . $value['difficulty'] . "</td>
                             <td>" . $value['distance'] . "</td>
                             <td>" . $value['duration'] . "</td>
                             <td>" . $value['height_difference'] . "</td>
                             <td>" . $value['available'] . "</td>
                             <td>
                                 <form method='post' action='update.php'>
                                     <input type='number' name='valeur' id='valeur' value='" . $value['id'] . "' style='display: none'>
                                     <input type='submit' name='submit' value='modifié'>
                                 </form>
                             </td>
                             <td>
                                 <form method='post' action='delete.php'>
                                     <input type='number' name='valeur' id='valeur' value='" . $value['id'] . "' style='display: none'>
                                     <input type='submit' name='submit' value='supprimé'>
                                 </form>
                             </td>
                         </tr>";
               }
           }
       }
       catch (PDOException $exception) {
           echo "Erreur de connexion: " . $exception->getMessage();
       }
       ?>
   </table>
</body>