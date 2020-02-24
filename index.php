<?php
require("functions/header.php");
?>

<body>
   
    <div class="introduction">
        <h1>Boîte à Recettes</h1>
        <p>Connecte toi et retrouves tes meilleurs recettes !</p>
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
    
</body>
