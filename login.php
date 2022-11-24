<?php
    include "config/base_url.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
	<?php include "views/head.php"; ?>
</head>
<body>
	<?php include "views/header.php"; ?>	

	<section class="page">
		<div class="auth-form">
            <h1>Login</h1>
			<form class="form" method="POST" action="<?=$BASE_URL?>/api/user/signin.php">
                <fieldset class="fieldset">
                    <input class="input" type="text" name="nickname" placeholder="Enter nickname">
                </fieldset>
                <fieldset class="fieldset">
                    <input class="input" type="password" name="password" placeholder="Enter password">
                </fieldset>

                <fieldset class="fieldset">
                    <button class="button registr-button" type="submit">Sign in</button>
                </fieldset>
			</form>
		</div>
	</section>
</body>
</html>