
<!DOCTYPE html>
<html lang="en">
<head>
    <TItle>ZOO ROBOT </TItle>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.CSS">
    <link rel="icon" href="grand.jpg">
</head>
<body>
<?php
// Obtenir l'heure actuelle au format 24 heures
$heure = date("H");
$nomFichierImage = "";

// Déterminer quel fichier d'image afficher en fonction de l'heure
if ($heure >= 0 && $heure < 12) {
    $heure = "zebre.jpg";
} elseif ($heure >= 12 && $heure < 18) {
    $heure = "Girafe3.jpg";
} else {
    $heure = "panda.jpg";
}
?>
    <h1><img src="<?php echo $heure; ?>" alt="Image Zoo Robot"><center>ZOO ROBOT</center></h1>
    <ul class="menu">
        <li><a href="http://localhost/wordpress/wordpress-6.3.1/wordpress/">Welcome</a></li>
        <li><a href="formTicket.html">Form</a></li>
    </ul>
    
    <div class="sectors">
        <div class="sector">
            <img src="tigrenoir.jpg"alt="Secteur 1">
            <p>The Black Panther robot in his cage, show the warrior who is not afraid thanks to his beautiful black skin color.</p>
            <p>SECTOR 1</p>
            <p>Superficie : 200 m²</p>
            <p>animals Présents : 3</p>
            <p>Capacity Maximal : 13</p>
        </div>

        <div class="sector">
            <img src="dau.jpg" alt="Secteur 2">
            <p> robot dolphin, which never pauses in water thanks to its technology an no need of sleep or of to rest . </p>
            <p>SECTOR 2</p>
            <p>Superficie : 200 m²</p>
            <p>animals Présents : 8</p>
            <p>Capacity Maximal : 13</p>
        </div>

        <div class="sector">
            <img src=" oiseau.jpg" alt="Secteur 3">
            <p>the robot bird flies with its steel wings and its color makes it unique.</p>
            <p>SECTOR 3</p>
            <p>Superficie : 130 m²</p>
            <p>animals Présents : 6</p>
            <p>Capacity Maximal : 10</p>
        </div>

        <div class="sector">
            <img src="eccureuil.jpg " alt="Secteur 4">
            <p>the robot squirrel is fast with its mechanical legs and can jump anywhere thanks to its mechanical agility</p>
            <p>SECTOR 4</p>
            <p>Superficie : 30 m²</p>
            <p>animals Présents : 8</p>
            <p>Capacity Maximal :20</p>
        </div>
    </div>
</body>
</html>
 