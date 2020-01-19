<?php include "db.php"; ?>
<?php
    $error_msg = "Invlaid Username or Password!";
    if(isset($_POST['login']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);
        
        $query = "SELECT * from users WHERE user_name = '{$username}' "; //AND user_password = {$password} ";
        $result = mysqli_query($connection, $query);
        
        if(!$result)
        {
            die("Failed! ".mysqli_error($connection));
        }
        
        while($row = mysqli_fetch_assoc($result))
        {
            $u_id = $row["user_id"];
            $u_name = $row["user_name"];
            $hashed_password = $row["user_password"];
            $u_firstname = $row["user_firstname"];
            $u_lastname = $row["user_lastname"];
            $u_role = $row["user_role"];
        }
        
        // used to decrypt the password
        if (hash_equals($hashed_password, crypt($password, $hashed_password)) && $username === $u_name && $u_role == 'admin')
        {
            $_SESSION['user_id'] = $u_id;
            $_SESSION['username'] = $u_name;
            $_SESSION['firstname'] = $u_firstname;
            $_SESSION['lastname'] = $u_lastname;
            $_SESSION['user_role'] = $u_role;
            header("Location: ../adminpanel");
        }
        elseif (hash_equals($hashed_password, crypt($password, $hashed_password)) && $username === $u_name && $u_role == 'subscriber') {
            $_SESSION['user_id'] = $u_id;            
            $_SESSION['username'] = $u_name;
            $_SESSION['firstname'] = $u_firstname;
            $_SESSION['lastname'] = $u_lastname;
            $_SESSION['user_role'] = $u_role;
            header("Location: ../index.php");
        }
        else
        {
            $_SESSION["error_msg"] = $error_msg;
            header("Location: ../login.php ");
        }
        
        
    }

?>