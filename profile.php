<?php
	include "common/time-ago.php";
	include "config/db.php";
    include "config/base_url.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <?php include "views/head.php"; ?>

</head>
<body>
    <?php  include "views/header.php"; ?>

    <section class="section">



        <div class="main">
           <?php
           include "views/categories.php";
           ?>

            <div class="main-profile">
                <div class="profile-header">
                    <?php
                        if($_SESSION['nickname'] == $_GET['nickname']){
                    ?>
                    <h1>My books</h1>
                    <a class="button" href="<?=$BASE_URL?>/newbook.php">New book</a>
                    <?php
                        }
                    ?>
                </div>
                <div class="book-list">
                    <?php
                        $nickname = $_GET['nickname'];
                        $prep = mysqli_prepare($con, 
                        "SELECT b.*, u.nickname FROM books b
                        LEFT OUTER JOIN users u ON
                        b.seller_id = u.id 
                        WHERE u.nickname =?");
                        mysqli_stmt_bind_param($prep, "s", $nickname);
                        mysqli_stmt_execute($prep);
                        $query = mysqli_stmt_get_result($prep);
                        if(mysqli_num_rows($query) > 0){
                            while($book = mysqli_fetch_assoc($query)){
                        
                    ?>
                    <a class="books" href="<?=$BASE_URL?>/detail.php?id=<?=$book['id']?>">
                        <img class="img-cost" src="<?=$BASE_URL?>/<?=$book['img']?>" alt="">
                        <div class="book-cost">
                            <p><?=$book['cost']?>$</p>
                        </div>
                    </a>
                    <?php    
                        }
                    }else{
                    ?>
                        <h1>0 books</h1>
                    <?php
                    }
                    ?>

                </div>
        
            
    </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.3.2.min.js" integrity="sha256-Ap4KLoCf1rXb52q+i3p0k2vjBsmownyBTE1EqlRiMwA=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script src="js/index.js"></script>
     
</body>
</html>