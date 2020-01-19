<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response To</th>
            <th>Date</th>
            <th>Approve</th>
            <th>UnApprove</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
<?php
    $query = "SELECT * from comments";
    $result = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($result))
    {
        $cmt_id = $row['cmt_id'];
        $cmt_post_id = $row['cmt_post_id'];
        $cmt_author = $row['cmt_author'];
        $cmt_content = $row['cmt_content'];
        $cmt_email = $row['cmt_email'];
        $cmt_status = $row['cmt_status'];
        $cmt_date = $row['cmt_date'];
        
        echo "<tr>";
        echo "<td>$cmt_id</td>";
        echo "<td>$cmt_author</td>";
        echo "<td>$cmt_content</td>";  
        echo "<td>$cmt_email</td>";
        echo "<td>$cmt_status</td>";
        
        //Getting the post title form the database so that we can display it dynamically
        $query = "SELECT * FROM posts WHERE post_id = $cmt_post_id";
        $get_post_id = mysqli_query($connection, $query);
        
        while($row = mysqli_fetch_assoc($get_post_id)){
            $post_id = $row["post_id"];
            $post_title = $row["post_title"];
            
            echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
        }
        
        echo "<td>$cmt_date</td>";
        echo "<td><a href='comments.php?approve=$cmt_id'>Approve</a></td>";
        echo "<td><a href='comments.php?unapprove=$cmt_id'>UnApprove</a></td>";
        echo "<td><a href='comments.php?edit=$cmt_id'>Edit</a></td>";
        echo "<td><a href='comments.php?delete=$cmt_id'>Delete</a></td>";
        echo "</tr>";
    }
?>
  
<?php
        
    if(isset($_GET['approve']))
    {
        $cmt_id = $_GET['approve'];
        
        $query = "UPDATE comments SET cmt_status = 'approved' WHERE cmt_id = $cmt_id";
        $approve_cmt = mysqli_query($connection, $query);
        header("Location: comments.php");
    }
        
    if(isset($_GET['unapprove']))
    {
        $cmt_id = $_GET['unapprove'];
        
        $query = "UPDATE comments SET cmt_status = 'unapproved' WHERE cmt_id = $cmt_id";
        $unapprove_cmt = mysqli_query($connection, $query);
        header("Location: comments.php");
    }
        
        
    if(isset($_GET['delete']))
    {
        $delete_cmt = $_GET['delete'];
        
        $query = "DELETE FROM comments where cmt_id = {$delete_cmt}";
        $delete = mysqli_query($connection, $query);
        header("Location: comments.php");
    }
?>
   
    </tbody>
</table>

                        