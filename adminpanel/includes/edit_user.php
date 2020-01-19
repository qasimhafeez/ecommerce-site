<?php 

    if(isset($_GET['u_id']))
    {
        $u_id = $_GET['u_id'];
    }
    
    // This section is only used for fetching the data from the database!!

    $query = "SELECT * from users WHERE user_id = {$u_id}";
    $result = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($result))
    {
        $u_name = $row['user_name'];
        $u_firstname = $row['user_firstname'];
        $u_lastname = $row['user_lastname'];
        $u_email = $row['user_email'];
        $u_password = $row['user_password'];
        $u_image = $row['user_image'];
        $u_role = $row['user_role'];
    }

    
    // Here in this section, store all the updated values into the variables here!!

    if(isset($_POST['update_user']))
    {
        $user_name = $_POST['user_name'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $user_role = $_POST['user_role'];
        
        $user_image = $_FILES["user_image"]["name"];
        $user_image_temp = $_FILES["user_image"]["tmp_name"];
        
        // To move the file path to the appropiate location
        move_uploaded_file($user_image_temp, "../images/$user_image");
        
        
        //Check whether the post image is empty or not and also used to show image while updating
        
        if(empty($user_image))
        {
            $query = "SELECT * from users WHERE user_id = {$u_id}";
            $select_image = mysqli_query($connection, $query);
            
            while($row = mysqli_fetch_assoc($select_image))
            {
                $user_image = $row['user_image'];
            }
        }
        
        
        
        //Encrypt the password

        $hashed_password = crypt($user_password);
        
        //This snippet is used to update the database!!
        
        $query = "UPDATE users SET ";
        $query .= "user_name = '{$user_name}', ";
        $query .= "user_password = '{$hashed_password}', ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_image = '{$user_image}', ";
        $query .= "user_role = '{$user_role}' ";
        $query .= "WHERE user_id = {$u_id} ";
        
        $update_user = mysqli_query($connection, $query);
        
        confirmQuery($update_user);
        echo '<script>window.location.href="users.php"</script>';
        
        // header("Location: users.php");
    }
//    if(!isset($_POST['update_user']))
//    {
//        //Decrypt the password
//        $password = $_POST['user_password'];
//        $password = crypt($password, $u_password);
//        $u_password = $password;
//    }
?>
   

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input value = "<?php echo $u_firstname; ?>" type="text" class="form-control" name="user_firstname">
    </div>
        
    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input value = "<?php echo $u_lastname; ?>" type="text" class="form-control" name="user_lastname">
    </div>
        
    <div class="form-group">
        <label for="user_name">Username</label>
        <input value = "<?php echo $u_name; ?>" type="text" class="form-control" name="user_name">
    </div>
    
    <div class="form-group">
        <label for="user_email">Email</label>
        <input value = "<?php echo $u_email; ?>" type="text" class="form-control" name="user_email">
    </div>
    
    <div class="form-group">
        <label for="user_password">Password</label>
        <input value = "" type="password" class="form-control" name="user_password" id="showPass" required>
        <!-- <a href="#" onclick="document.getElementById('showPass').type = 'password';">show password</a> -->
    </div>

    <div class="form-group">
        <img width='250' src="../images/<?php echo $u_image; ?>" alt="image">
        <input type="file" name="user_image">
    </div>
   
    <div class="form-group">
        <select name="user_role" id="">
            <option value="<?php echo $u_role; ?>"><?php echo $u_role; ?></option>
            <?php 
                if($user_role == 'admin')
                {
                    echo "<option value='subscriber'>subscriber</option>";
                }
                else
                {
                    echo "<option value='admin'>admin</option>";
                }
            ?>
            
        </select>
    </div>
    
    <div class="form-group">
    <input type="submit" class="btn btn-primary" name="update_user" value="Update User">
    </div>
    
</form>