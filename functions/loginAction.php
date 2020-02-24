<?php 
    require("database.php");

    
    //Si pseudo entré, check:
    if( !empty($_POST["pseudo"])){
        $req = $db->prepare("SELECT * FROM users WHERE pseudo = :pseudo");
        $req->bindParam(":pseudo", $_POST["pseudo"]);
        $req->execute();

        //Si c'est un nouvel utilisateur, alors pseudo inconnu dans la bdd
        $result = $req->fetch(PDO::FETCH_ASSOC);
        if($result == false){
            $req = $db->prepare("INSERT INTO users (id, pseudo) VALUES(:id, :pseudo)");
            $req->bindParam(":id", $_POST["id"]);
            $req->bindParam(":pseudo", $_POST["pseudo"]);
            $req->execute();
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
    
    //Si pseudo empty
    if( empty($_POST["pseudo"])){
        $message = "Merci de mettre votre pseudo";
        header("Location: ../index.php?message=$message");
    }

?>