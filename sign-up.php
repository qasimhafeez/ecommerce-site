<?php  include "includes/header.php"; ?>
<?php

    if(isset($_POST['submit']))
    {
        
        $u_name = $_POST['username'];
        $u_email = $_POST['email'];
        $u_pass = $_POST['password'];
        $u_fname = $_POST['firstname'];
        $u_lname = $_POST['lastname'];
        
        if(!empty($u_name) && !empty($u_email) && !empty($u_pass))
        {
            $u_name   = mysqli_real_escape_string($connection, $u_name);
            $u_email  = mysqli_real_escape_string($connection, $u_email);
            $u_pass   = mysqli_real_escape_string($connection, $u_pass);
            $u_fname  = mysqli_real_escape_string($connection, $u_fname);
            $u_lname  = mysqli_real_escape_string($connection, $u_lname);
            
            // Validation of Email and Username
            global $connection;
            $query = "SELECT * FROM users where user_name = '{$u_name}' OR user_email = '{$u_email}'";
            $result = mysqli_query($connection, $query);
            if (mysqli_num_rows($result) > 0) {
                $message = "Email or Username Already Existed!";
            }
            else {
                $hashed_pass = crypt($u_pass);
                
                //Inserting Data
                $query = "INSERT into users (user_name, user_email, user_password, user_role, user_firstname, user_lastname, reg_date) ";
                $query .= "VALUES ('{$u_name}', '{$u_email}', '{$hashed_pass}', 'subscriber', '{$u_fname}', '{$u_lname}', now() )";
                $register_user = mysqli_query($connection, $query);
                
                echo '<script>window.location.href="index.php"</script>';
                
            }

            
        }
        else
        {
            $message = "Fill out the fields properly!";
        }
    }
    else
    {
        $message = "";
    }

?>   
   
   
   
   
   <header>
		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					
                    <!-- Logo -->
					<div class="header-logo">
					<?php include "includes/logo.php"; ?>
					</div>
					<!-- /Logo -->
                </div>

			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
    <!-- /Header -->
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Sign up</h1>
                    <form role="form" action="sign-up.php" method="post" id="login-form" autocomplete="off">
                       <h5 class="text-center text-danger"><?php echo $message; ?></h5>
                        <div class="form-group">
                            <label for="firstname" class="sr-only">First Name</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="sr-only">Last Name</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">User Name</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                            <span id="uname-validate"></span>
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                            <span id="email-validate"></span>
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



	<script src="js/jquery.min.js"></script>
	<!-- <script src="js/validate.js"></script> -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>

<script>

$(document).ready(function(){

$("#username").blur(function(){
    var username = $(this).val();
    $.ajax({
        url: "validate.php",
        method: "POST",
        data: {uname: username},
        dataType: "text",
        success:function(html){
            $("#uname-validate").html(html);
        }
    });
});

$("#email").blur(function(){
    var email = $(this).val();
    $.ajax({
        url: "validate.php",
        method: "POST",
        data: {email: email},
        dataType: "text",
        success:function(html){
            $("#email-validate").html(html);
        }
    });
});


});
</script>

</body>

</html>
