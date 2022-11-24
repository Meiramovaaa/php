<?php
    include "../../config/base_url.php";
    include "../../config/db.php";

    if(isset( $_POST["nickname"],$_POST["password"]) &&
    strlen($_POST['nickname']) > 0 &&
    strlen($_POST['password']) > 0){
        $nickname = $_POST['nickname'];
        $hash = sha1($_POST['password']);

        $prep = mysqli_prepare($con, 
        "SELECT * FROM users WHERE nickname=? AND password=?");
        mysqli_stmt_bind_param($prep, "ss", $nickname,$hash);
        mysqli_stmt_execute($prep);
        $users =  mysqli_stmt_get_result($prep);

        if(mysqli_num_rows($users) == 0){
            header("Location:$BASE_URL/login.php?error=2");
            exit();
        }

        $user = mysqli_fetch_assoc($users);
        session_start();
        $_SESSION['nickname'] = $user['nickname'];
        $_SESSION['id'] = $user['id'];


        header("Location:$BASE_URL/profile.php?nickname=$nickname");
    }else{
        header("Location:$BASE_URL/login.php?error=1");
    }
?>