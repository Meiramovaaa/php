<?php
    include "config/db.php";
    include "config/base_url.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "views/head.php";
    ?>
    <title> Payment </title>
</head>
<body>
    <?php
        include "views/header.php"
    ?>

    <div class="buy">
        <div class="buy-modal">
            <form method="POST" id="form" action="api/basket/buy.php">
                <h2>Purchase details</h2>
                <fieldset class="fieldset">
                    <input type="text" name="number" id="" placeholder="Enter your phone number">
                </fieldset>
                
                <p>Total price:</p>
                <p class="cost-p">32 $</p>
                <fieldset class="fieldset">
                    <button class="button" type="submit">Buy</button>
                </fieldset>
                
            </form>
        </div>
        
    </div>
    

<!-- <script src="js/buy.js"></script> -->
</body>
</html>