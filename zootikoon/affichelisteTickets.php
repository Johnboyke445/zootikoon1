<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher Ticket</title>
    <!-- Inclure Bootstrap via CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Afficher Ticket</h2>
        <form action="affichelisteTickets.php" method="POST">
            <div class="form-group">
                <label for="ticketId">ID du Ticket :</label>
                <input type="text" class="form-control" id="ticketId" name="ticketId" required>
            </div>
            <button type="submit" class="btn btn-primary">Afficher Ticket</button>
        </form>

        <?php
        // Afficher les erreurs PHP
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        // Vérifier si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer l'ID du ticket depuis la requête
            $ticketId = isset($_POST['ticketId']) ? intval($_POST['ticketId']) : 0;

            // Vérifier si l'ID est valide
            if ($ticketId > 0) {
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
                    } else {
                        echo "Connexion réussie à la base de données.<br>";
                    }

                    // Requête SQL avec une déclaration préparée
                    $query = "SELECT * FROM ticket WHERE id = ?";
            
                    $statement = $conn->prepare($query);
                    $statement->bind_param("i", $ticketId);

                    // Vérifier l'exécution de la requête préparée
                    if ($statement->execute()) {
                        echo "Requête exécutée avec succès.<br>";
                        $result = $statement->get_result();

                        // Vérifier s'il y a des résultats
                        if ($result && $result->num_rows > 0) {
                            // Afficher les détails du ticket
                            $row = $result->fetch_assoc();
                            echo '<h3>Détails du Ticket</h3>';
                            echo '<p>ID: ' . $row['id'] . '</p>';
                            echo '<p>Login: ' . $row['login'] . '</p>';
                            echo '<p>Sujet: ' . $row['sujet'] . '</p>';
                            echo '<p>Description: ' . $row['description'] . '</p>';
                            echo '<p>Priorité: ' . $row['prio'] . '</p>';
                            echo '<p>Secteur: ' . $row['secteur'] . '</p>';
                            echo '<p>Statut: ' . $row['statut'] . '</p>';
                        } else {
                            // Aucun ticket trouvé avec l'ID spécifié
                            echo 'Aucun ticket trouvé avec l\'ID ' . $ticketId;
                        }
                    } else {
                        echo "Erreur lors de l'exécution de la requête : " . $statement->error;
                    }

                    // Fermer la connexion
                    $conn->close();
                } catch (Exception $e) {
                    // En cas d'exception, loguer l'erreur
                    error_log("Erreur : " . $e->getMessage());
                    echo "Une erreur est survenue. Veuillez réessayer ultérieurement.";
                }
            } else {
                // ID du ticket non valide
                echo 'Veuillez saisir un ID de ticket valide.';
            }
        }
        ?>
    </div>
    <!-- Inclure Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>