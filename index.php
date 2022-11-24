<?php
	include "common/time-ago.php";
	include "config/db.php";
    include "config/base_url.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Main</title>
    <?php include "views/head.php"; ?>

</head>
<body>
    <?php  include "views/header.php"; ?>

    <section class="section">
        <div class="main">
            <?php
                include "views/categories.php";
            ?>
            <div class="main-books">
                
                <a class="books" href="">
                    <img class="img-cost" src="images/book1.png" alt="">
                    <div class="book-cost">
                            <p>32 $</p>
                    </div>
                </a>

                <h1>0 books</h1>

            </div>

            
        </div>
        
        <div class="pagination">

        </div>
        
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.3.2.min.js" integrity="sha256-Ap4KLoCf1rXb52q+i3p0k2vjBsmownyBTE1EqlRiMwA=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script src="js/index.js"></script>
     
</body>
</html>