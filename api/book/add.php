<?php
    include "../../config/base_url.php";
    include "../../config/db.php";

    if(isset($_POST['title'],$_POST["description"],
    $_POST['category_id'], $_POST['cost'], 
    $_FILES['image'], $_FILES['image']['name']) &&
    strlen($_POST['title']) > 0 &&
    strlen($_POST['description']) > 0 &&
    strlen($_FILES['image']['name']) > 0 &&
    intval($_POST['category_id']) && 
    strlen($_POST['cost']) > 0){
        $title = $_POST['title'];
        $desc = $_POST['description'];
        $cat_id = $_POST['category_id'];
        $cost = $_POST['cost'];
        session_start();
        $seller_id = $_SESSION['id'];

        $ext = end(explode(".", $_FILES['image']['name']));
        $image_name = time().".".$ext;

        move_uploaded_file($_FILES['image']['tmp_name'], "../../images/books/$image_name");
        $path = "images/books/".$image_name;

        $prep = mysqli_prepare($con, 
        "INSERT INTO books (title, description, category_id, img, cost, seller_id)
        VALUES(?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($prep, 'ssissi', $title, $desc, $cat_id, $path, 
        $cost, $seller_id);
        mysqli_stmt_execute($prep);
        header("Location:$BASE_URL/profile.php?nickname=".$_SESSION['nickname']);
    }else{
        header("Location:$BASE_URL/newbook.php?error=1");
    }
?>