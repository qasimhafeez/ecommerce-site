<?php 

    if(isset($_GET['p_id']))
    {
        $p_id = $_GET['p_id'];
    }
    
    // This section is only used for fetching the data from the database!!

    // $query = "SELECT products.p_id, products.p_img, products.p_desc, 
    //             stores.s_name, categories.c_cat, products.p_date 
    //             from products 
    //             INNER JOIN stores ON products.p_store_id = stores.s_id
    //             INNER JOIN categories ON products.p_cat_id = categories.c_id
    //             WHERE products.p_id = {$p_id}";
    $query = "SELECT * FROM products where p_id = {$p_id}";
    $result = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($result))
    {
        $p_id = $row['p_id'];
        $p_image = $row['p_img'];
        $p_desc = $row['p_desc'];
        //$p_store = $row['s_name'];
        //$p_cat = $row['c_cat'];
        $p_date = $row['p_date'];
    }

    if(isset($_POST['update_product']))
    {
        // $p_id = $_POST['p_id'];
        $p_img = $_POST['p_img'];
        $p_desc = $_POST['p_desc'];
        $p_cat = $_POST['cat'];
        
        //This snippet is used to update the database!!
        
        $query = "UPDATE products SET ";
        $query .= "p_img = '{$p_img}', ";
        $query .= "p_desc = '{$p_desc}', ";
        $query .= "p_cat_id = '{$p_cat}' ";
        
        $query .= "WHERE p_id = {$p_id} ";
        
        $update_post = mysqli_query($connection, $query);
        
        confirmQuery($update_post);
        
//        echo "<p class='bg-success'>Post has been Updated! " . " " . "<a href='../post.php?p_id=$p_id'>View Post</a></p>";
        
        header("Location: products.php");
        
    }
?>
   

<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
        <label for="p_img">Product Image</label>
        <textarea name="p_img" id="" cols="30" rows="10" class="form-control tinymce"><?php echo $p_image; ?>
        </textarea>
    </div>  <div class="form-group">
        <label for="post_content">Product Title</label>
        <textarea name="p_desc" id="" cols="1" rows="1" class="form-control tinymce"><?php echo $p_desc; ?>
        </textarea>
    </div>
    <!-- <div class="form-group">
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
    </div> -->
    
    <div class="form-group">
    <input type="submit" class="btn btn-primary" name="update_product" value="Update Product">
    </div>
    
</form>