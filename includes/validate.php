<?php //include "includes/header.php"; ?>
<?php  
    if(isset($_POST["uname"])){
        global $connection;
        $query = " SELECT * FROM users WHERE user_name = {$_POST['uname']} ";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) > 0) {
            echo '<span class="text-danger">Username Not Available.</span>';
        }
        else {
            echo '<span class="text-success">Username Available.</span>';
        }
    }
    if(isset($_POST["email"])){
        global $connection;
        $query = " SELECT * FROM users WHERE user_email = {$_POST['email']} ";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) > 0) {
            echo '<span class="text-danger">Email Not Available.</span>';
        }
        else {
            echo '<span class="text-success">Email Available.</span>';
        }
    }

?>