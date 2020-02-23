<body class="bodyrecette">

    <?php
        require("functions/database.php");
        require("functions/header.php");
        $pseudo = $_GET["pseudo"];

        //var_dump($_GET["pseudo"]);

        // select tout dans la table users à partir de pseudo 
            $req = $db->prepare("SELECT * FROM users WHERE pseudo = :pseudo");
            $req->bindParam(":pseudo", $_GET["pseudo"]);
            $req->execute();
            $result = $req->fetch(PDO::FETCH_ASSOC);

        // if un résultat est trouvé dans la base de données
            if($result == true){
    ?>
        <div class="miam">
            <div class="gauche">
                <div></div>
                <div></div>
            <?php 
            $result=str_replace(array("\r\n","\n"),'<br />',$result);
            ?> 
                <h1><?php echo $result["recette"];?></h1>
                <h2>Ingrédients</h2>
                <p><?php echo $result["ingredients"]; ?></p> <br>
                <h2>Étapes</h2>
                <p><?php echo $result["etapes"]; ?></p>
            </div>

       
            <div class="droite">
                <img src="<?php echo $result["image"]; ?>" alt=""></img>
            </div>


        </div>
        <?php
    }

        // else si nouveau, donc sans aucunes recettes
        else{
    ?> 
        <div class="nouveau">
            <?php
            ?>
            <p class="bienvenue"> <?php echo "Bienvenue " . $pseudo ?> </p> 
            <button class="ajout">Ajout d'une recette</button>        
        </div>
        <?php
    }
    ?> 
</body>