<?php include "includes/header.php"; ?>
<?php include "includes/jumbotron.php"; ?>

	<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				<?php include "includes/category_nav.php"; ?>
				<!-- /category nav -->

				<!-- menu nav -->
				<?php include "includes/navigation.php"; ?>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li class="active">Products</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- MAIN -->
				<div id="main" class="col-md-12">
					<!-- store top filter -->
					<?php include "includes/product_filter.php"; ?>
					<!-- /store top filter -->

					<!-- STORE -->
					<?php include "includes/store.php"; ?>
					<!-- /STORE -->

					<!-- store bottom filter -->
					<?php include "includes/product_filter.php"; ?>
					<!-- /store bottom filter -->
				</div>
				<!-- /MAIN -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- FOOTER -->
	<?php include "includes/footer.php" ?>