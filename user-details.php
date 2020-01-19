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
	
	<!-- User Section -->
	<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
		<div class="row">
			<div class="col-sm-10"><h1><?php echo $_SESSION["username"]; ?></h1></div>
		</div>
		<div class="row">
			<!-- <div class="col-sm-3">
				

		<div class="text-center">
            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
            <br>
            <h6>Upload a different photo...</h6>
            <br>
			<input type="file" class="text-center center-block file-upload">
		</div><br> -->
          
        </div><!--/col-3-->
    	<div class="col-sm-9">
            <?php if($error_message !== ""): ?>
        <div class="alert alert-danger alert-dismissible">
          <p class="text-center text-danger">
            <?php echo $error_message; ?>
          </p>
        </div>
        <?php 
            endif;
        ?>
			<div class="tab-pane" id="settings">
                  <form class="form" action="user-details.php" method="post" id="registrationForm">
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="first_name"><h4>First name</h4></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any." value="<?php echo $firstname ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any." value="<?php echo $lastname; ?>">
                          </div>
                      </div>
                      
                      <div class="form-group">
                      
                          <div class="col-xs-6">
                          <br>
                              <label for="phone"><h4>Phone</h4></label>
                              <input type="number" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any." value="<?php echo $phone; ?>">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                              <br>
                             <label for="mobile"><h4>Mobile</h4></label>
                              <input type="number" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any." value="<?php echo $mobile; ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                          <br>
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email." value="<?php echo $email; ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                          <br>    
                          <label for="email"><h4>Address</h4></label>
                              <input type="text" class="form-control" id="location" placeholder="somewhere" title="enter a location" name="address" value="<?php echo $address; ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                          <br>    
                          <label for="password"><h4>Password</h4></label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password."><br>
                              <a href="reset-password.php">Change Password</a>
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<input class="btn btn-lg btn-success pull-right" type="submit" name="save" value="Save" >
                            </div>
                      </div>
              	</form>
              </div>
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
	
	<!-- FOOTER -->
<?php include("includes/footer.php");?>
