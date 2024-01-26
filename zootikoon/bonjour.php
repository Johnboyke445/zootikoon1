<?php echo "Bonjour" ; ?>            

<?php

echo"bonjour";

            // Obtenir l'heure actuelle au format 24 heures
            $heure = date("H");
            
            // Déterminer quelle image afficher en fonction de l'heure
            if ($heure >= 0 && $heure < 12) {
                echo '<img src="zebre.jpg" alt="Zèbre le matin">';
            } elseif ($heure >= 12 && $heure < 18) {
                echo '<img src="girafe.jpg" alt="Girafe l\'après-midi">';
            } else {
                echo '<img src="panda.jpg" alt="Panda à midi">';
            }
            ?>