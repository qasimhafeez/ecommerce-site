<?php 
    include "includes/header.php";
?>
<!-- Login -->
                <div class="container" style="padding: 5%">
                   <div class="row">
                   <div class="col-xs-6 col-xs-offset-3">
                    <h4>Login</h4>
                    <form action="includes/login.php" method="post">
                        <span class="text-danger" name="error_msg">
                            <?php if(isset($_SESSION["error_msg"]))
                                {
                                    $error = $_SESSION["error_msg"];
                                    echo $error;
                                } 
                            ?>
                        </span>
                        <div class="form-group">
                            <input placeholder="Enter Username" name="username" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <input placeholder="Enter Password" name="password" type="password" class="form-control">
                        </div>
                        <div class="input_group">
                            <button class="btn btn-primary" name="login" type="submit">Login</button>
                        </div>
                    </form>
                    <!-- /.input-group -->
                    </div>
                    </div>
                </div>
    <?php unset($_SESSION["error_msg"]); ?>

    <script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
