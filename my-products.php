<?php include "includes/header.php"; ?>
	<!-- HEADER -->
	<header>
		
		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					
					<!-- Logo -->
					<?php include "includes/logo.php"; ?>
					<!-- /Logo -->

					<!-- Search -->
					<div class="header-search">
						<?php include "includes/search.php"; ?>
					</div>
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
						<!-- Account -->
						<?php include "includes/account.php"; ?>
						<!-- /Account -->

						<!-- Cart -->
						<?php include "includes/cart.php"; ?>
						<!-- /Cart -->

						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->

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