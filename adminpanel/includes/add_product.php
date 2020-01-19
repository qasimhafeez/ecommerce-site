<?php
    if(isset($_POST["create_product"]))
    {
        $cat = $_POST["cat"];
        $title = $_POST["title"];
        $img = $_POST["img"];
        
        $query = "INSERT INTO products(p_img, p_desc, p_cat_id, p_store_id, p_date) ";
        $query .= "VALUES('{$img}', '{$title}', '{$cat}', 1, now())";
        
        $result = mysqli_query($connection, $query);
        
        confirmQuery($result);
        
        //echo "<p class='bg-success'>New post has been Created! " . " " . "<a href='../post.php?p_id=$p_id'>View Post</a></p>";
        header("Location: products.php");
        
    }
?>
   

   
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="cat">Choose Category</label><br>
        <select name="cat" id="">
            
            <?php 
                $query = "SELECT * from categories";
                $result = mysqli_query($connection, $query);
            
                confirmQuery($result);
            
                while($row = mysqli_fetch_assoc($result))
                {
                    $cat_id = $row["cid"];
                    $cat_title = $row["c_cat"];
                    
                    echo "<option value='$cat_id'>{$cat_title}</option>";
                }
            ?>
            
        </select>
    </div>
    <div class="form-group">
        <label for="img">Prodct Image Link</label>
        <textarea name="img" id="" cols="30" rows="10" class="form-control tinymce"></textarea>
    </div>
    
    <div class="form-group">
        <label for="title">Product Title Link</label>
        <textarea name="title" id="" cols="30" rows="10" class="form-control tinymce"></textarea>
    </div>
    
    <div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_product" value="Add Product ">
    </div>
    
</form>