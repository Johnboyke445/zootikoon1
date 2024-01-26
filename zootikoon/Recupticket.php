<?php

session_start();
if (isset($_POST['emailLogin']) && isset($_POST['Priority levels']) && isset($_POST['Sujet']) && isset($_POST['Statut']) && isset($_POST['Description'])  && isset($_POST['Zoo Sector']) ){
    echo $_POST['Login'];
    echo $_POST['Priority levels'];
    echo $_POST['Sujet'];
    echo $_POST['Statut'];
    echo $_POST['description'];
    echo $_POST['Zoo Sector'];
}

$dsn = 'mysql:dbname=zoo;host=127.0.0.1';
$user = 'root';
$password = '';
try {
    $dbh = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} catch (PDOException $e) {
    echo 'Connexion échouée:' . $e->getMessage();
}