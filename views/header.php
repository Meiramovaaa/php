
<header class="header" >
        <div class="header-logos">
            <img src="images/header-logo1.png" alt="">
            <a href="<?=$BASE_URL?>/index.php"><img src="<?=$BASE_URL; ?>/images/header-logo2.png" alt=""></a> 
        </div>
    
        <div class="header-search">
            <img src="images/header-search.png" alt="">
            <form class="form1" method="GET">
                <input type="hidden" name="page" value="1">
                <input class="header-input" type="text" name="q" placeholder="Search for the book you want and read it now... Sherlock Holmes, Harry Pot...">
                <button type="submit" class="button button-search">	
                    Найти
                </button>
			</form>
        </div>
    
        <div class="header-icon">

        <?php   
        if(isset($_SESSION['id'])){
        ?>
            <a class="basket" href="">
                 <img class="history-icon" src="images/history.svg" alt="">
                
                        <p class="basket-num">0</p>
            </a>
            <a class="basket" href="">
                 <img class="basket-icon" src="images/basket.png" alt="">
                
                        <p class="basket-num">0</p>

            </a>
            
            <a href="<?=$BASE_URL?>/profile.php?nickname=<?=$_SESSION['nickname']?>"><img class="header-user" src="images/header-user.png" alt=""></a>
            <fieldset class="fieldset">
               <a href="<?=$BASE_URL?>/api/user/signout.php"><button class="button" type="submit">Sign Out</button></a> 
            </fieldset>
        <?php
        }else{
        ?>
           <fieldset class="fieldset">
               <a href="<?=$BASE_URL?>/register.php"><button class="button" type="submit">Sign Up</button></a> 
             </fieldset>
    
            <fieldset class="fieldset">
                <a href="<?=$BASE_URL?>/login.php"><button class="button" type="submit">Login</button></a> 
            </fieldset>
        </div>
        <?php
        }
        ?>

    
    </header>

    <div class="header-search1">
           
            <form class="form1" method="GET">
                <img src="images/header-search.png" alt="">
                <input type="hidden" name="page" value="1">
                <input class="header-input" type="text" name="q" placeholder="Search for the book you want and read it now... Sherlock Holmes, Harry Pot...">
                <button type="submit" class="button button-search">	
                    Найти
                </button>
			</form>
        </div>
