<?php
$DB_HOST = "localhost";
$DB_NAME = "recettes";
$DB_USER = "root";
$DB_PASSWORD = "";
try {
    $db = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}