<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Profile Pic</th>
            <th>Promote</th>
            <th>Demote</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
<?php
    $query = "SELECT * from users";
    $result = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($result))
    {
        $user_id = $row['user_id'];
        $user_name = $row['user_name'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
        
        echo "<tr>";
        echo "<td>$user_id</td>";
        echo "<td>$user_name</td>";
        echo "<td>$user_firstname</td>";  
        echo "<td>$user_lastname</td>";
        echo "<td>$user_email</td>";
        
        //Getting the post title form the database so that we can display it dynamically
//        $query = "SELECT * FROM posts WHERE post_id = $cmt_post_id";
//        $get_post_id = mysqli_query($connection, $query);
//        
//        while($row = mysqli_fetch_assoc($get_post_id)){
//            $post_id = $row["post_id"];
//            $post_title = $row["post_title"];
//            
//            echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
//        }
        
        echo "<td>$user_role</td>";
        echo "<td><img src='../images/$user_image' alt='image' width='100'></td>";
        echo "<td><a href='users.php?change_to_admin=$user_id'>Admin</a></td>";
        echo "<td><a href='users.php?change_to_sub=$user_id'>Subscriber</a></td>";
        echo "<td><a href='users.php?source=edit_user&u_id=$user_id'>Edit</a></td>";
        echo "<td><a href='users.php?delete=$user_id'>Delete</a></td>";
        echo "</tr>";
    }
?>
  
<?php
        
    if(isset($_GET['change_to_admin']))
    {
        $u_id = $_GET['change_to_admin'];
        
        $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $u_id";
        $make_admin = mysqli_query($connection, $query);
        header("Location: users.php");
    }
        
    if(isset($_GET['change_to_sub']))
    {
        $u_id = $_GET['change_to_sub'];
        
        $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $u_id";
        $make_subscriber = mysqli_query($connection, $query);
        header("Location: users.php");
    }
        
        
    if(isset($_GET['delete']))
    {
        if(isset($_SESSION['user_role'])) {
            // if(isset($_SESSION['user_role'] == "admin")) {


                $delete_user = mysqli_real_escape_string($connection, $_GET['delete']);
                
                $query = "DELETE FROM users where user_id = {$delete_user}";
                $delete = mysqli_query($connection, $query);
                header("Location: users.php");
            }    
        }
    
?>
   
    </tbody>
</table>

                        