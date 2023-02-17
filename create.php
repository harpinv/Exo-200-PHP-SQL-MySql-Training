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
    <h1>Entrée une randonnée</h1>
    <form action="enregistre.php" method="post">
        <div>
            <label for="name">name:</label>
            <input type="text" name="name" placeholder="Nom de la randonnée" id="name">
        </div>
        <div>
            <label for="difficulty">Difficulty:</label>
            <select name="difficulty" id="difficulty">
                <option value="très facile">Très facile</option>
                <option value="facile">Facile</option>
                <option value="moyen">Moyen</option>
                <option value="difficile">Difficile</option>
                <option value="très difficile">Très difficile</option>
            </select>
        </div>
        <div>
            <label for="distance">Distance:</label>
            <input type="text" name="distance" placeholder="Distance en kilomètre" id="distance">
        </div>
        <div>
            <label for="duration">Duration:</label>
            <input type="time" name="duration" id="duration">
        </div>
        <div>
            <label for="height_difference">Height_difference:</label>
            <input type="number" name="height_difference" placeholder="Dénivelé en mètre" id="height_difference">
        </div>
        <div>
            <label for="available">Available:</label>
            <input type="date" name="available" id="available">
        </div>
        <div>
            <input type="submit" name="submit" value="enregistrer">
        </div>
    </form>
</body>
</html>