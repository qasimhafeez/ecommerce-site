<?php include("includes/header.php");
if(!isset($_SESSION["user_id"]))
{
    header("Location: index.php");
}
$error_message= "";
$user_id = $_SESSION["user_id"];
global $connection;
$query = "SELECT * from users where user_id = $user_id";
$result = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $username = $row["user_name"];
    $firstname = $row["user_firstname"];
    $lastname = $row["user_lastname"];
    $email = $row["user_email"];
    $phone = $row["user_phone"];
    $mobile = $row["user_mobile"];
    $address = $row["user_address"];
    $hashed_password = $row["user_password"];

}
?>


<?php 
    if(isset($_POST["save"]))
    {
        $firstname = $_POST["first_name"];
        $lastname = $_POST["last_name"];
        $phone = $_POST["phone"];
        $mobile = $_POST["mobile"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $password = $_POST["password"];
        $hashed = crypt($password);

        if(hash_equals($hashed_password, crypt($password, $hashed_password))){
            $query = "UPDATE users SET ";
            $query .= "user_name = '{$username}', ";
            $query .= "user_password = '{$hashed}', ";
            $query .= "user_firstname = '{$firstname}', ";
            $query .= "user_lastname = '{$lastname}', ";
            $query .= "user_email = '{$email}', ";
            $query .= "user_phone = '{$phone}', ";
            $query .= "user_mobile = '{$mobile}', ";
            $query .= "user_address = '{$address}' ";
            //$query .= "user_image = '{$image}' ";
            $query .= "WHERE user_id = {$user_id} ";
            
            $update_user = mysqli_query($connection, $query);
            
            confirmQuery($update_user);
            echo '<script>window.location.href="user-details.php"</script>'; 
        }
        else{
            $error_message = "Incorrent Password!";
        }

    }
?>
<?php include "includes/jumbotron.php"; ?>

	<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				<?php include "includes/category_nav.php";?>
				<!-- /category nav -->

				<!-- menu nav -->
				<?php include "includes/navigation.php";?>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
    <!-- /NAVIGATION -->
    
    <div class="col-md-offset-4 col-sm-offset-4">
<form id="" class="clearfix" method="post" action="" style="margin-top: 120px; margin-bottom:100px" >
    <div class="col-xs-6">
        <div class="billing-details">
            <div class="section-title">
                <h3 class="title">Change Password</h3>
            </div>
            <div class="form-group">
                <input class="input" type="password" name="current-password" placeholder="Current Password">
            </div>
            <div class="form-group">
                <input class="input" type="text" name="new-password" placeholder="New Passord" id="newpass">
            </div>
            <div class="form-group">
                <input class="input" type="email" name="verify-new-password" placeholder="Verify Password" id="verifypass">
            </div>							
            <div id="success"></div>
            <!-- For success/fail messages -->
            <input type="submit" class="btn btn-success pull-right" name="changepassword" value="Change Password" onclick="changePassword()">
        </div>
    </div>
</form>
</div>
   
	<!-- FOOTER -->
<?php include("includes/footer.php");?>
