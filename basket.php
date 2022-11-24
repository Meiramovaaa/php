<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "views/head.php";
    ?>
    <title>Basket</title>
</head>
<body>
    <?php
        include "views/header.php";
        
    ?>
    
    <section class="section basket-section">
        <div class="detail">
            <div class="basket-info">
                <h1>dddd</h1>
                <p class="basket-cost">56</p>
            </div>
            <img  src="images/book1.png" alt="">
            <p> dscfwsefwe4f</p>
            <fieldset class="fieldset">
                <a href=""><button class="button" type="submit">Delete from basket</button></a> 
            </fieldset>
                      
        </div>
    </section>

    <div class="detail basket-res">
        <h3>Total price: 89 $</h3>
        <form action="buy.php" method="POST">
            <input type="hidden" name="cost" value="90">
            <fieldset class="fieldset">
                <a href="buy.php"><button class="button" type="submit">Сheckout</button></a> 
            </fieldset>
        </form>
        
    </div>
    
    
        <h1 class="detail basket-res">0 in basket</h1>
    
</body>
</html>