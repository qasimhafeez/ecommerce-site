<?php include "includes/admin_header.php"?>
    
<?php
    
    //we can also do it from $_GET request, but im doing it by the help of sessions
    if(isset($_SESSION['username']))
    {
        $u_name = $_SESSION['username'];
    }
        $query = "SELECT * from users WHERE user_name = '{$u_name}'";
        $get_username = mysqli_query($connection, $query);
        
        while($row = mysqli_fetch_assoc($get_username))
        {
            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];

        }


?>     

       
       
<?php
    
// Here in this section, store all the updated values into the variables here!!

    if(isset($_POST['update_profile']))
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
            $query = "SELECT * from users WHERE user_id = {$user_id}";
            $select_image = mysqli_query($connection, $query);
            
            while($row = mysqli_fetch_assoc($select_image))
            {
                $user_image = $row['user_image'];
            }
        }
        
        
        //This snippet is used to update the database!!
        

        $hashed_pass = crypt($user_password);

        $query = "UPDATE users SET ";
        $query .= "user_name = '{$user_name}', ";
        $query .= "user_password = '{$hashed_pass}', ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_image = '{$user_image}', ";
        $query .= "user_role = '{$user_role}' ";
        $query .= "WHERE user_id = {$user_id} ";
        
        $update_user = mysqli_query($connection, $query);
        
        
    }

?>
        
    <div id="wrapper">

        <!-- Navigation -->
       <?php include "includes/admin_navigation.php" ?> 
       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin Panel
                            <small><?php echo $_SESSION['firstname']." ".$_SESSION['lastname']; ?></small>
                        </h1>
                        
                        <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                            <input type="text" name="hidden" autocomplete="false" style="display: none;">
                            <div class="form-group">
                                <label for="user_firstname">First Name</label>
                                <input value = "<?php echo $user_firstname; ?>" type="text" class="form-control" name="user_firstname">
                            </div>

                            <div class="form-group">
                                <label for="user_lastname">Last Name</label>
                                <input value = "<?php echo $user_lastname; ?>" type="text" class="form-control" name="user_lastname">
                            </div>

                            <div class="form-group">
                                <label for="user_name">Username</label>
                                <input value = "<?php echo $user_name; ?>" type="text" class="form-control" name="user_name">
                            </div>

                            <div class="form-group">
                                <label for="user_email">Email</label>
                                <input value = "<?php echo $user_email; ?>" type="text" class="form-control" name="user_email">
                            </div>

                            <div class="form-group">
                                <label for="user_password">Password</label>
                                <input value = "" type="password" class="form-control" name="user_password" required autocomplete="false">
                                <!-- <a href="#" onclick="document.getElementById('showPass').type = 'password';">show password</a> -->
                            </div>

                            <div class="form-group">
                                <img width='250' src="../images/<?php echo $user_image; ?>" alt="image">
                                <input type="file" name="user_image">
                            </div>

                            <div class="form-group">
                                <select name="user_role" id="">
                                    <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
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
                            <input type="submit" class="btn btn-primary" name="update_profile" value="Update Profile">
                            </div>

                        </form>
                        
                    </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php" ?>