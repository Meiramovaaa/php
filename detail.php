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
    <title>Book-details</title>
</head>
<body data-baseurl="<?=$BASE_URL?>">
    <?php
    include "views/header.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = mysqli_query($con, 
        "SELECT b.*, c.name FROM books b
        LEFT OUTER JOIN categories c ON
        b.category_id = c.id WHERE b.id=$id");
        $book = mysqli_fetch_assoc($query);
    }    
    ?>

    <section class="section">
        <div class="detail">
            <div class="detail-header">
                <div>
                    <h1 ><?=$book['title']?></h1>
                    <p><?=$book['description']?></p>
                </div>
                
                
                    <div class='detail-button'>
                        <fieldset class="fieldset">
                            <a href="<?=$BASE_URL?>/editbook.php?id=<?=$book['id']?>"><button class="button" type="submit">Edit</button></a> 
                        </fieldset>
                        <fieldset class="fieldset">
                            <a href=""><button class="button" type="submit">Delete</button></a> 
                        </fieldset>
                    </div>
                    
                
                <div class='detail-button'>
                    <fieldset class="fieldset">
                                <a class="button addToBasket" href="">Add to basket</a>
                    </fieldset>
                </div>
                
            </div>
            
            <img class="detail-img"  src="images/book2.png" alt="">
            <p > Category: <?=$book['name']?> </p> <br>
            <p> <?=$book['cost']?> $</p>
            
           
            <div class="comments" id = "comments">
            </div>

            <?php
            if(isset($_SESSION['nickname'])){
            ?>
                <div class="rating">
                    <i class="rating__star far fa-star"></i>
                    <i class="rating__star far fa-star"></i>
                    <i class="rating__star far fa-star"></i>
                    <i class="rating__star far fa-star"></i>
                    <i class="rating__star far fa-star"></i>
                </div>

                <span class="comment-add">
                    <textarea id="comment-text" name="" class="comment-textarea" placeholder="Введит текст комментария"></textarea>
                    <button id="add-comment" class="button">Send</button>
                </span> 
            <?php
            }else{
            ?>            
                <span class="comment-warning">
                    To leave a comment <a href="register.php">register</a> , or  <a href="login.php">login</a>  to an account.
                </span>
            <?php
            }
            ?>

        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.0/axios.min.js" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="js/comment.js"></script>   
    <script src="js/star.js"></script>
    <script src="js/index.js"></script>
    
</body>
</html>