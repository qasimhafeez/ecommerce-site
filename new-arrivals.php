<?php include "includes/header.php" ?>
<?php include "includes/jumbotron.php" ?>
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
<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li class="active">New Arrival</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->
<?php include "includes/new_arrivals.php" ?>


<?php include "includes/footer.php" ?>