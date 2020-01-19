<?php 

    if(isset($_GET['p_id']))
    {
        $p_id = $_GET['p_id'];
    }
    
    // This section is only used for fetching the data from the database!!

    $query = "SELECT * from posts WHERE post_id = {$p_id}";
    $result = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($result))
    {
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_cat_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_comments = $row['post_comment_count'];
        $post_date = $row['post_date'];
    }


    // Here in this section, store all the updated values into the variables here!!

    if(isset($_POST['update_post']))
    {
        $post_title = $_POST["post_title"];
        $post_author = $_POST["post_author"];
        $post_category = $_POST["post_category"];
        $post_status = $_POST["post_status"];
        
        $post_image = $_FILES["post_image"]["name"];
        $post_image_temp = $_FILES["post_image"]["tmp_name"];
        
        $post_tags = $_POST["post_tags"];
        $post_content = $_POST["post_content"];
        
        // To move the file path to the appropiate location
        move_uploaded_file($post_image_temp, "../images/$post_image");
        
        
        //Check whether the post image is empty or not and also used to show image while updating
        
        if(empty($post_image))
        {
            $query = "SELECT * from posts WHERE post_id = {$p_id}";
            $select_image = mysqli_query($connection, $query);
            
            while($row = mysqli_fetch_assoc($select_image))
            {
                $post_image = $row['post_image'];
            }
        }
        
        
        //This snippet is used to update the database!!
        
        $query = "UPDATE posts SET ";
        $query .= "post_title = '{$post_title}', ";
        $query .= "post_author = '{$post_author}', ";
        $query .= "post_cat_id = '{$post_category}', ";
        $query .= "post_date = now(), ";
        $query .= "post_author = '{$post_author}', ";
        $query .= "post_status = '{$post_status}', ";
        $query .= "post_tags = '{$post_tags}', ";
        $query .= "post_content = '{$post_content}', ";
        $query .= "post_image = '{$post_image}' ";
        $query .= "WHERE post_id = {$p_id} ";
        
        $update_post = mysqli_query($connection, $query);
        
        confirmQuery($update_post);
        
//        echo "<p class='bg-success'>Post has been Updated! " . " " . "<a href='../post.php?p_id=$p_id'>View Post</a></p>";
        
        header("Location: ../post.php?p_id=$p_id");
        
    }
?>
   

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input value = "<?php echo $post_title; ?>" type="text" class="form-control" name="post_title">
    </div>
    
    <div class="form-group">
        <select name="post_category" id="">
            
            <?php 
                $query = "SELECT * from categories";
                $result = mysqli_query($connection, $query);
            
                confirmQuery($result);
            
                while($row = mysqli_fetch_assoc($result))
                {
                    $cat_id = $row["cat_id"];
                    $cat_title = $row["cat_title"];
                    
                    echo "<option value='$cat_id'>{$cat_title}</option>";
                }
            ?>
            
        </select>
    </div>
        
    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input value = "<?php echo $post_author; ?>" type="text" class="form-control" name="post_author">
    </div>
        
    <div class="form-group">
        <select name="post_status" id="">
            <option value="<?php echo $post_status; ?>"><?php echo $post_status; ?></option>
            <?php
                if($post_status == 'published')
                {
                    echo "<option value='draft'>draft</option>";      
                }
                else
                {
                    echo "<option value='published'>published</option>";
                }
            ?>
        </select>
    </div>
        
    <div class="form-group">
        <img width='250' src="../images/<?php echo $post_image; ?>" alt="image">
        <input type="file" name="post_image">
    </div>
    
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value = "<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
    </div>
        
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea name="post_content" id="" cols="30" rows="10" class="form-control tinymce"><?php echo $post_content; ?>
        </textarea>
    </div>
    
    <div class="form-group">
    <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
    </div>
    
</form>