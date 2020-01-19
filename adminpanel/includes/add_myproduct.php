<?php
    if(isset($_POST["add_product"]))
    {
        $uploads_dir = '../images/';

        $imageArr = array();

        foreach ($_FILES["image"]["error"] as $key => $error) {

            if ($error == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["image"]["tmp_name"][$key];
            $name = $_FILES["image"]["name"][$key];
            move_uploaded_file($tmp_name, "$uploads_dir/$name");
            array_push($imageArr,$name);
        }

    }

        $imageArr=serialize($imageArr);
        $mp_title = escape($_POST["mp_title"]);
        $mp_company = escape($_POST["mp_company"]);
        $mp_desc = escape($_POST["mp_desc"]);
        $mp_stock = escape($_POST["mp_stock"]);
        $mp_new_price = escape($_POST["mp_new_price"]);
        $mp_old_price = escape($_POST["mp_old_price"]);
        $mp_cat = escape($_POST["mp_cat"]);
        $mp_status = escape($_POST["mp_status"]);
        
        $query = "INSERT INTO myproducts(mp_title, mp_company, mp_desc, mp_new_price, mp_old_price,
                    mp_imgs, mp_cat, mp_date, mp_status, mp_stock) 
                    VALUES('{$mp_title}', '{$mp_company}', '{$mp_desc}', '{$mp_new_price}','{$mp_old_price}', 
                    '{$imageArr}', '{$mp_cat}', now(),'{$mp_status}', '{$mp_stock}')";
        global $connection;
        $result = mysqli_query($connection, $query);
        
        confirmQuery($result);
        
        //echo "<p class='bg-success'>New post has been Created! " . " " . "<a href='../post.php?p_id=$p_id'>View Post</a></p>";
        //header("Location: products.php");
        redirect("products.php?source=add_myproduct");
        
    }
?>
   

   
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="mp_title">Product Title</label>
        <input type="text" class="form-control" name="mp_title" >
    </div>
    <div class="form-group">
        <label for="mp_company">Product Company</label>
        <input type="text" class="form-control" name="mp_company" >
    </div>
    <div class="form-group">
        <label for="mp_desc">Product Description</label>
        <textarea name="mp_desc" id="" cols="30" rows="10" class="form-control tinymce" ></textarea>
    </div>
    <div class="form-group">
        <label for="mp_stock">Product Stock</label>
        <input type="number" class="form-control" name="mp_stock" >
    </div>
    <div class="form-group">
        <label for="mp_new_price">Product New Price</label>
        <input type="number" class="form-control" name="mp_new_price" step=".01">
    </div>
    <div class="form-group">
        <label for="mp_old_price">Product Old Price</label>
        <input type="number" class="form-control" name="mp_old_price" step=".01">
    </div>
    <div class="form-group">
        <label for="image[]">Upload Product Images</label>
        <input type="file" class="form-control" name="image[]" multiple="multiple" >
    </div>

    <div class="form-group">
        <label for="mp_cat">Choose Category</label>
        <select name="mp_cat" id="" class="form-control">
            
            <?php 
                
                $query = "SELECT * from subcategories";
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
        <label for="mp_status">Status</label>
       <select name="mp_status" id="" class="form-control" required>
           <option value="published">publish</option>
           <option value="draft">draft</option>
       </select>
    </div>
    <div class="form-group">
    <input type="submit" class="btn btn-primary" name="add_product" value="Add Product ">
    </div>
    
</form>