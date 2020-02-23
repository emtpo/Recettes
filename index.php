<?php
require("functions/header.php");
?>

<body>
    <div class="fond">
   
        <div class="text">
            <div class="color"></div>
            <div class="color"></div>
            <h1>La boîte à recettes</h1>
            <p>Bienvenue sur la boîte à recettes ! Découvres ici les meilleures recettes de tes potes et ajoutes-en à ton tour pour partager tes meilleures mets avec la communauté ! </p>
            <form action="functions/loginAction.php" method="post">
                <input type="text" name="pseudo" id="pseudo" placeholder="pseudo">
                <input type="submit"></input>
            </form>

            <div class="message">
                <?php 
                    if (isset($_GET["message"])){
                        echo $_GET["message"];
                    }
                ?>
            </div>
        </div>
    </div>
</body>
