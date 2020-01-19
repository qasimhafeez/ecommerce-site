<?php
    
    if(isset($_POST['cbArray']))
    {
        //here we will store all the values of the checkBox array down bellow to another variable
        
        $getBoxArray = $_POST['cbArray'];
        
        //loop through the array and save the array items into another value as foreach loop does
        foreach($getBoxArray as $getPostId)
        {
            
            //Here we will get the value from the choice ID right down bellow in the div container like published etc
            $choice = $_POST['getChoice'];
            
            switch($choice)
            {
                case 'published':
                    $query = "UPDATE posts SET post_status = '{$choice}' WHERE post_id = {$getPostId} ";
                    $update = mysqli_query($connection, $query);
                    break;
                case 'draft':
                    $query = "UPDATE posts SET post_status = '{$choice}' WHERE post_id = {$getPostId} ";
                    $update = mysqli_query($connection, $query);
                    break;
                case 'delete':
                    $query = "DELETE FROM posts WHERE post_id = {$getPostId} ";
                    $update = mysqli_query($connection, $query);
                    break;
            }
            
        }
    }
    
?>
   

   
   
<form action="" method="post">    
    <table class="table table-bordered table-hover">
       
        <div class="col-xs-4 zero-padding">
           <select name="getChoice" id="getChoice" class="form-control">
               <option value="">Select Option</option>
               <option value="published">Publish</option>
               <option value="draft">Draft</option>
               <option value="delete">Delete</option>
           </select>
        </div>

        <div class="col-xs-4">
           <input type="submit" name="submit" value="Apply" class="btn btn-success">
           <a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
        </div>

        <thead>
            <tr>
                <th><input type="checkbox" id="selectAllBoxes"></th>
                <th>Id</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Comments</th>
                <th>Date</th>
                <th>View Post</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $query = "SELECT * from posts";
            $result = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($result))
            {
                $post_id = $row['post_id'];
                $post_author = $row['post_author'];
                $post_title = $row['post_title'];
                $post_category = $row['post_cat_id'];
                $post_status = $row['post_status'];
                $post_image = $row['post_image'];
                $post_tags = $row['post_tags'];
                $post_comments = $row['post_comment_count'];
                $post_date = $row['post_date'];

                echo "<tr>";
        ?>
        
                <td><input type="checkbox" class="checkBox" name="cbArray[]"
                value="<?php echo $post_id; ?>"></td>
        
        
        <?php
                echo "<td>$post_id</td>";
                echo "<td>$post_author</td>";
                echo "<td>$post_title</td>";

                //Getting the category title to its right place 
                $query = "SELECT * from categories WHERE cat_id = {$post_category}";
                $get_cat_id = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($get_cat_id)){
                    $cat_id = $row["cat_id"];
                    $cat_title = $row["cat_title"];

                    //Display Category Title
                    echo "<td>$cat_title</td>";
                }

                echo "<td>$post_status</td>";
                echo "<td><img src='../images/$post_image' alt='image' width='100'></td>";
                echo "<td>$post_tags</td>";
                echo "<td>$post_comments</td>";
                echo "<td>$post_date</td>";
                echo "<td><a href='../post.php?p_id={$post_id}'>View</a></td>";
                echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                echo "<td><a onClick=\" javascript: return confirm('Are you sure, You want to delete?'); \"
                            href='posts.php?delete={$post_id}'>Delete</a></td>";
                echo "</tr>";
            }
        ?>
            
        <?php
            if(isset($_GET['delete']))
            {
                $delete_post = $_GET['delete'];

                $query = "DELETE FROM posts where post_id = {$delete_post}";
                $delete = mysqli_query($connection, $query);
                header("Location: posts.php");
            }
        ?>

        </tbody>
    </table>
</form>
                        