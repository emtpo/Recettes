<?php
require("database.php");

//si le champs pseudo est vide
if( empty($_POST["pseudo"])){
    $message = "Vous devez remplir un pseudo";
    header("Location: ../index.php?message=$message");
}

//si le champs pseudo a été rempli, début check PDO
if( !empty($_POST["pseudo"])){
    $req = $db->prepare("SELECT * FROM users WHERE pseudo = :pseudo");
    $req->bindParam(":pseudo", $_POST["pseudo"]);
    $req->execute();

    //si pseudo n'est pas dans la base de données
    $result = $req->fetch(PDO::FETCH_ASSOC);
    if($result == false){
        $pseudo =  $_POST["pseudo"];
        header("Location: ../recette.php?pseudo=$pseudo");
    }
    
    //si le pseudo est dans la base de données
    else{
        session_start();
        $pseudo =  $_POST["pseudo"];
        header("Location: ../recette.php?pseudo=$pseudo");
    }
}