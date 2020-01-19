<?php include "db.php"; ?>
<?php 
    $error_message = "Invalid Password";
    if(isset($_POST["changepassword"]))
    {
        global $connection;
        $user_id = $_SESSION["user_id"];
        $query = "SELECT * from users WHERE user_id = $user_id";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $hashed_password = $row["user_password"];
        }

        $currentPassword = $_POST["current-password"];
        $newPassword = $_POST["new-password"];
        $verifyNewPassword = $_POST["verify-new-password"];

        if(hash_equals($hashed_password, crypt($newPassword, $hashed_password))){

        }
    }
?>
