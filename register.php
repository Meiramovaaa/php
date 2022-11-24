<?php
    include "config/base_url.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Rigistr</title>
    <?php include "views/head.php"; ?>
</head>
<body>

    <?php include "views/header.php"; ?>

    <section class="page">
		<div class="auth-form">
            <h1>Sign Up</h1>
			<form class="form" action="<?=$BASE_URL?>/api/user/signup.php" method="POST">
                <fieldset class="fieldset">
                    <input class="input" type="email" name="email" placeholder="Enter email">
                </fieldset>
                <fieldset class="fieldset">
                    <input class="input" type="text" name="full_name" placeholder="Enter Full name">
                </fieldset>
                <fieldset class="fieldset">
                    <input class="input" type="text" name="nickname" placeholder="Enter Nickname">
                </fieldset>
                <fieldset class="fieldset">
                    <input class="input" type="password" name="password" placeholder="Enter password">
                </fieldset>
                <fieldset class="fieldset">
                    <input class="input" type="password" name="password2" placeholder="Enter password">
                </fieldset>

                <fieldset class="fieldset">
                    <button class="button registr-button" type="submit">Sign Up</button>
                </fieldset>
			</form>
		</div>

        
	</section>
    <?php
        if(isset($_GET['error']) &&  $_GET['error'] == '1'){
    ?>
        <p class="danger">Fill all information</p>
    <?php
        }elseif(isset($_GET['error']) &&  $_GET['error'] == '2'){
    ?>
        <p class="danger">You didn't confirm your password, they are not equal</p>
    <?php
        }elseif(isset($_GET['error']) &&  $_GET['error'] == '3'){
    ?>
        <p class="danger">User with this email or nickname already exists</p>
    <?php
        }
    ?>
</body>
</html>