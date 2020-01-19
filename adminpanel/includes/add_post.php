<?php
    if(isset($_POST["create_post"]))
    {
        $post_title = $_POST["post_title"];
        $post_author = $_POST["post_author"];
        $post_category_id = $_POST["post_category"];
        $post_status = $_POST["post_status"];
        
        $post_image = $_FILES["post_image"]["name"];
        $post_image_temp = $_FILES["post_image"]["tmp_name"];
        
        $post_tags = $_POST["post_tags"];
        $post_content = $_POST["post_content"];
        $post_date = date("d-m-y");
        
        move_uploaded_file($post_image_temp, "../images/$post_image");
        
        
        $query = "INSERT INTO posts(post_cat_id, post_title, post_author, post_date, post_image,
                    post_content, post_tags, post_status) ";
        $query .= "VALUES({$post_category_id}, '{$post_title}', '{$post_author}', now(),
                    '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}')";
        
        $result = mysqli_query($connection, $query);
        
        confirmQuery($result);
        
        //echo "<p class='bg-success'>New post has been Created! " . " " . "<a href='../post.php?p_id=$p_id'>View Post</a></p>";
        header("Location: posts.php");
        
    }
?>
   

   
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" name="post_title">
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
        <input type="text" class="form-control" name="post_author">
    </div>
        
    <div class="form-group">
       <select name="post_status" id="">
           <option value="published">published</option>
           <option value="draft">draft</option>
       </select>
    </div>
        
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="post_image">
    </div>
    
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
        
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea name="post_content" id="" cols="30" rows="10" class="form-control tinymce"></textarea>
    </div>
    
    <div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post ">
    </div>
    
</form>