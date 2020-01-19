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

    <!-- BREADCRUMB -->
<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li class="active">Deals of the Day</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->


<?php include "includes/deals_of_the_day.php" ?>


<?php include "includes/footer.php" ?>