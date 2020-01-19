<?php include("includes/header.php");
    if(!isset($_SESSION['username']))
    {
        header("Location: index.php");
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
	
<hr>

                                                      