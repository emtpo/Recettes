<body class="bodyrecette">

    <?php
        require("functions/database.php");
        require("functions/header.php");
        $pseudo = $_GET["pseudo"];


        // select tout dans la table recettes à partir de pseudo 
            $req = $db->prepare("SELECT * FROM `users` WHERE pseudo = :pseudo");
            $req->bindParam(":pseudo", $_GET["pseudo"]);
            $req->execute();
            $result = $req->fetch(PDO::FETCH_ASSOC);

        // if un résultat est trouvé dans la base de données
            if($result == true){
    ?> 
    
        <?php 
            $result=str_replace(array("\r\n","\n"),'<br />',$result);
        ?> 
        <h1><?php echo $result["recette"];?></h1>
        
        <div class="recette">
            <div class="ingredients">
                <h4>Vos Ingrédients</h4>
                <p><?php echo $result["ingredients"]; ?></p> <br>
            </div>

            <div class="etapes">
                <h4>Les Étapes</h4>
                <p><?php echo $result["etapes"]; ?></p>
            </div>

            <div class="image">
                <img src="<?php echo $result["image"]; ?>" alt=""></img>
            </div>

        </div>
        <?php
    }

        // Si l'utilisateur est nouveau, il n'a pas de recettes: else
        else{
    ?> 
        <div class="nouveau">
            <?php
            ?>
            <p class="bienvenue"> <?php echo "Bienvenue " . $pseudo ?> </p>
            <p>Soyez le premier à poster une recette !</p>
            <button class="ajout">Ajouter</button>
        </div>
       
        <?php
    }
    ?> 
</body>