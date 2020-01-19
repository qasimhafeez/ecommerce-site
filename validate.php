<?php include "includes/header.php"; ?>
<?php
    global $connection;
    if(isset($_POST["uname"])){
        $uname = $_POST['uname'];
        $query = " SELECT * FROM users WHERE user_name = '{$uname}' ";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) > 0) {
            echo '<span class="text-danger">Username Not Available.</span>';
        }
        else {
            echo '<span class="text-success">Username Available.</span>';
        }
    }

    if(isset($_POST["email"])){
        $uemail = $_POST['email'];
        $query = " SELECT * FROM users WHERE user_email = '{$uemail}' ";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) > 0) {
            echo '<span class="text-danger">Email Not Available.</span>';
        }
        else {
            echo '<span class="text-success">Email Available.</span>';
        }
    }

?>