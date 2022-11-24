<div class="sidebar">
    <h3>Popular Categories</h3>
    
    <div class="checkbox">
        <?php
        $query = mysqli_query($con, 
        "SELECT * FROM categories");
        while($cat = mysqli_fetch_assoc($query)){
        ?>
            <a href=''><?=$cat['name']?></a>
        <?php
        }
        ?>
    </div>
</div>