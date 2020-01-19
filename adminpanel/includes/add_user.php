<?php
    if(isset($_POST["create_user"]))
    {
        $user_firstname = $_POST["user_firstname"];
        $user_lastname = $_POST["user_lastname"];
        $user_name = $_POST["user_name"];
        
        $user_image = $_FILES["user_image"]["name"];
        $user_image_temp = $_FILES["user_image"]["tmp_name"];
        
        $user_email = $_POST["user_email"];
        $user_password = $_POST["user_password"];
        $user_role = $_POST["user_role"];
        //$post_date = date("d-m-y");
        
        move_uploaded_file($user_image_temp, "../images/$user_image");
        
        $user_password = crypt($user_password);


        $query = "INSERT INTO users(user_name, user_password, user_firstname, user_lastname, user_email,
                    user_image, user_role) ";
        $query .= "VALUES('{$user_name}', '{$user_password}', '{$user_firstname}', '{$user_lastname}',
                    '{$user_email}', '{$user_image}', '{$user_role}')";
        
        $result = mysqli_query($connection, $query);
        
        confirmQuery($result);
        
//        echo "<p>New user has been created!</p>" . " " . "<a href='users.php'>View Users</a>";
        header("Location: users.php");
        
    }
?>
   

   
<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
        
    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
       
    <div class="form-group">
        <label for="user_name">Username</label>
        <input type="text" class="form-control" name="user_name">
    </div>
    
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>
        
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>
        
    <div class="form-group">
        <label for="user_image">User Image</label>
        <input type="file" name="user_image">
    </div>
    
    <div class="form-group">
        <select name="user_role" id="">
            <option value="subscriber">Select Options</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>
    
    <div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_user" value="Create User">
    </div>
    
</form>