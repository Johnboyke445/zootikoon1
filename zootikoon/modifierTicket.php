<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zoo";  

try {
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    // Vérifier si le ticket avec l'ID 4568 existe
    $ticketIdToUpdate = 4568;
    $checkQuery = "SELECT * FROM ticket WHERE id = ?";
    
    // Utilisation de déclarations préparées
    $checkStatement = $conn->prepare($checkQuery);
    $checkStatement->bind_param("i", $ticketIdToUpdate);
    $checkStatement->execute();
    $checkResult = $checkStatement->get_result();

    if ($checkResult && $checkResult->num_rows > 0) {
        // Mettre à jour le statut du ticket avec id=4568 à "resolu"
        $newStatus = "resolu";
        $updateQuery = "UPDATE ticket SET statut = ? WHERE id = ?";
        
        // Utilisation de déclarations préparées
        $updateStatement = $conn->prepare($updateQuery);
        $updateStatement->bind_param("si", $newStatus, $ticketIdToUpdate);
        $updateResult = $updateStatement->execute();

        if ($updateResult) {
            echo "Le statut du ticket a été mis à jour avec succès.";
        } else {
            echo "Erreur lors de la mise à jour du statut du ticket : " . $conn->error;
        }
    } else {
        echo "Le ticket avec l'ID $ticketIdToUpdate n'existe pas.";
    }

    // Fermer la connexion
    $conn->close();
} catch (Exception $e) {
    // En cas d'exception, loguer l'erreur
    error_log("Erreur : " . $e->getMessage());
    echo "Une erreur est survenue. Veuillez réessayer ultérieurement.";
}
?>