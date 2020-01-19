<?php 

    if(isset($_GET['p_id']))
    {
        $p_id = $_GET['p_id'];
    }
    $query = "SELECT * FROM myproducts where mp_id = {$p_id}";
    $result = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($result))
    {
        $p_id = $row['mp_id'];
        $p_title = $row['mp_title'];
        $p_company = $row['mp_company'];
        $p_desc = $row['mp_desc'];
        $p_new_price = $row['mp_new_price'];
        $p_old_price = $row['mp_old_price'];
        $p_cat = $row['mp_cat'];
        $p_stock = $row['mp_stock'];
    }

    if(isset($_POST['update_product']))
    {
        $mp_title = escape($_POST["mp_title"]);
        $mp_company = escape($_POST["mp_company"]);
        $mp_desc = escape($_POST["mp_desc"]);
        $mp_stock = escape($_POST["mp_stock"]);
        $mp_new_price = escape($_POST["mp_new_price"]);
        $mp_old_price = escape($_POST["mp_old_price"]);
        $mp_cat = escape($_POST["mp_cat"]);
        //This snippet is used to update the database!!
        
        $query = "UPDATE myproducts SET ";
        $query .= "mp_title = '{$mp_title}', ";
        $query .= "mp_company = '{$mp_company}', ";
        $query .= "mp_desc = '{$mp_desc}', ";
        $query .= "mp_new_price = '{$mp_new_price}', ";
        $query .= "mp_old_price = '{$mp_old_price}', ";
        $query .= "mp_cat = '{$mp_cat}', ";
        $query .= "mp_stock = '{$mp_stock}' ";
        $query .= "WHERE mp_id = {$p_id} ";
        
        $update_post = mysqli_query($connection, $query);
        
        confirmQuery($update_post);
        
//        echo "<p class='bg-success'>Post has been Updated! " . " " . "<a href='../post.php?p_id=$p_id'>View Post</a></p>";
        
        echo '<script>window.location.href="myproducts.php"</script>';
    }
?>
   

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="mp_title">Product Title</label>
        <input type="text" class="form-control" name="mp_title" value="<?=$p_title; ?>">
    </div>
    <div class="form-group">
        <label for="mp_company">Product Company</label>
        <input type="text" class="form-control" name="mp_company" value="<?=$p_company; ?>">
    </div>
    <div class="form-group">
        <label for="mp_desc">Product Description</label>
        <textarea name="mp_desc" id="" cols="30" rows="10" class="form-control tinymce" value="<?=$p_desc; ?>"></textarea>
    </div>
    <div class="form-group">
        <label for="mp_stock">Product Stock</label>
        <input type="number" class="form-control" name="mp_stock" value="<?=$p_stock; ?>">
    </div>
    <div class="form-group">
        <label for="mp_new_price">Product New Price</label>
        <input type="number" class="form-control" name="mp_new_price" step=".01" value="<?=$p_new_price; ?>">
    </div>
    <div class="form-group">
        <label for="mp_old_price">Product Old Price</label>
        <input type="number" class="form-control" name="mp_old_price" step=".01" value="<?=$p_old_price; ?>">
    </div>

    <div class="form-group">
        <label for="mp_cat">Choose Category</label>
        <select name="mp_cat" id="" class="form-control">
            
            <?php 
                
                $query = "SELECT * from subcategories ORDER BY sc_title";
                $result = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($result))
                {
                    $c_id = $row["sc_id"];
                    $c_cat = $row["sc_title"];
                    
                    echo "<option value={$c_id}>{$c_cat}</option>";
                }
            ?>
            
        </select>
    </div>
    <div class="form-group">
    <input type="submit" class="btn btn-primary" name="update_product" value="Update Product ">
    </div>
    
</form>