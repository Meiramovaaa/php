
<?php
    include "config/db.php";
    include "config/base_url.php";
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$query = mysqli_query($con, 
		"SELECT * FROM books WHERE id=$id");
		$row = mysqli_fetch_assoc($query);
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Edit</title>
	<?php include "views/head.php"; ?>
</head>
<body>
	<?php include "views/header.php"; ?>	

	<section class="page">
		<div class="page-block">

			<div class="page-header">
				<h2>Editting book</h2>
			</div>
			<form class="form" action="<?=$BASE_URL?>/api/book/update.php?id=<?=$row['id']?>" method="POST" enctype="multipart/form-data">
				
				<fieldset class="fieldset">
					<input class="input" type="text" name="title" placeholder="Заголовок" value="<?=$row['title']?>">
				</fieldset>

				<fieldset class="fieldset">
				<select name="category_id" id="category_id" class="input">
					<?php
					$categories = mysqli_query($con, 
					"SELECT * FROM categories");
					while($cat = mysqli_fetch_assoc($categories)){
						if($cat['id'] == $row['category_id']){
					?>
						<option disable selected value='<?=$cat['id']?>'><?=$cat['name']?></option>
					<?php
						}else{
					?>
						<option value='<?=$cat['id']?>'><?=$cat['name']?></option>
					<?php
						}
					}
					?>
				</select>

				<fieldset class="fieldset">
					<button class="button button-yellow input-file">
						<input type="file" name="image">	
						Choose the image
					</button>
				</fieldset>
					
				<fieldset class="fieldset">
					<textarea class="input input-textarea" name="description" id="" cols="30" rows="10" placeholder="Описание"><?=$row['description']?></textarea>
				</fieldset>

				<fieldset class="fieldset">
					<input class="input" type="text" name="cost" placeholder="Цена" value="<?=$row['cost']?>">
				</fieldset>

				<fieldset class="fieldset">
					<button class="button" type="submit">Save</button>
				</fieldset>
			</form>

			
			<?php
			if(isset($_GET['error']) && $_GET['error'] == '1'){
			?>

				<p class="text-danger"> Title and Description cannot be empty!</p>

			<?php
			}
			?>

		</div>

	</section>
	
	

	
	
</body>
</html>
<?php
	}
?>