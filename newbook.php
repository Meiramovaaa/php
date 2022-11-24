<?php
	include "config/db.php";
	include "config/base_url.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>New book</title>
	<?php include "views/head.php"; ?>
</head>
<body>
	<?php include "views/header.php"; 
		
	?>	

	<section class="container page">
		<div class="page-block">

			<div class="page-header">
				<h2>New book</h2>
			</div>
			
			<form class="form" action="<?=$BASE_URL?>/api/book/add.php" method="POST" enctype="multipart/form-data">
				
			<fieldset class="fieldset">
				<input class="input" type="text" name="title" placeholder="Title">
			</fieldset>

			<fieldset class="fieldset">
				<select name="category_id" id="category_id" class="input">
					<?php
						$categories = mysqli_query($con, 
						"SELECT * FROM categories");
						while($cat = mysqli_fetch_assoc($categories)){
					?>
						<option value='<?=$cat["id"]?>'><?=$cat["name"]?></option>
					<?php
						}
					?>
				</select>
			</fieldset class="fieldset">
			
			<fieldset class="fieldset">
				<button class="button button-yellow input-file">
					<input type="file" name="image">	
					Choose the image
				</button>
			</fieldset>
				
			<fieldset class="fieldset">
				<textarea class="input input-textarea" name="description" id="" cols="30" rows="10" placeholder="Description"></textarea>
			</fieldset>

			<fieldset class="fieldset">
				<input class="input" type="text" name="cost" placeholder="Price in dollars"> 
			</fieldset>
			
			<fieldset class="fieldset">
				<button class="button" type="submit">Save</button>
			</fieldset>
			</form>

			

			<p class="text-danger"> The title and description cannot be empty!</p>


	
		</div>

	</section>
	
</body>
</html>