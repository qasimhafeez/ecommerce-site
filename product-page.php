<?php include "includes/header.php"; ?>
<?php ob_start(); ?>
<?php 
	if(isset($_GET["id"]))
	{
		$p_id = $_GET["id"];

		global $connection;
		// $query = "SELECT p.mp_id,p.mp_title, p.mp_company, p.mp_desc, p.mp_imgs, p.mp_new_price, 
		// 				 p.mp_old_price, p.mp_stock, c.c_cat, c.c_id 
		// 				 from myproducts p
		// 				 JOIN categories c 
		// 				 ON p.mp_cat = c.c_id 
		// 				 where mp_id = {$p_id}";

		$query = "SELECT * FROM myproducts where mp_id = $p_id";
		$result = mysqli_query($connection, $query);
		$img = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$id = $row["mp_id"];
			$title = $row["mp_title"];
			$company = $row["mp_company"];
			$desc = $row["mp_desc"];
			$img = unserialize($row["mp_imgs"]);
			$new_price = $row["mp_new_price"];
			$old_price = $row["mp_old_price"];
			$stock = $row["mp_stock"];
			// $cat = $row["c_cat"];
			// $c_id = $row["c_id"];
		

 ?>

 <?php ob_start(); ?>
	<?php include "includes/jumbotron.php" ?>
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
				<li><a href="#">Home</a></li>
				<li><a href="myproducts.php">My Products</a></li>
				<!-- <li><a href="myproducts.php?cid=<?php echo $c_id; ?>"><?php echo $cat; ?></a></li> -->
				<li class="active"><?php echo $title ?></li>
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
				<!--  Product Details -->
				<div class="product product-details clearfix">
					<div class="col-md-6">
						<div id="product-main-view">
							<?php 
								foreach ($img as $key => $value){
							?>
							<div class="product-view">
								<img src="images/<?php echo $img[$key]; ?>" alt="" class="img-responsive" style="max-width: 450px !important">
							</div>
							<?php } ?>
						</div>

						
						<div id="product-view">
							<?php 
								foreach ($img as $key => $value){
							?>
							<div class="product-view">
								<img src="images/<?php echo $img[$key]; ?>" alt="" class="img-responsive" style="max-height: 150px !important">
							</div>
							<?php } ?>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="product-body">
							<!-- <div class="product-label">
								<span>New</span>
								<span class="sale">-20%</span>
							</div> -->
							<h2 class="product-name"><?php echo $title; ?></h2>
							<h3 class="product-price"><?php echo "$".$new_price; ?> 
								<del class="product-old-price"><?php echo "$".$old_price; ?></del>
							</h3>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<a href="#">3 Review(s) / Add Review</a>
							</div>
							<?php 
							if ($stock > 0) {
								echo "<p><strong>Availability:</strong> In Stock</p>";
							}
							else
							{
								echo "<p><strong>Availability:</strong> Not Available Right Now</p>";
							}
							 ?>
							<p><strong><?php echo $company; ?></strong></p>
							<?php echo $desc; ?>
								<!-- <div class="product-options">
									<ul class="size-option">
										<li><span class="text-uppercase">Size:</span></li>
										<li class="active"><a href="#">S</a></li>
										<li><a href="#">XL</a></li>
										<li><a href="#">SL</a></li>
									</ul>
									<ul class="color-option">
										<li><span class="text-uppercase">Color:</span></li>
										<li class="active"><a href="#" style="background-color:#475984;"></a></li>
										<li><a href="#" style="background-color:#8A2454;"></a></li>
										<li><a href="#" style="background-color:#BF6989;"></a></li>
										<li><a href="#" style="background-color:#9A54D8;"></a></li>
									</ul>
								</div> -->
								<br>
							<form method="post" action="add_cart.php" id="add_product_form">
								<h5><span class="text-success">Available Item(s).</h5>
								
								<input id="pid" type="hidden" name="pid" 
										value="<?php echo $id; ?>">
								<!-- <input id="cart_product_quantity" type="hidden" name="product_quantity" 
										value="<?php echo $id; ?>"> -->
								<div class="qty-input">
									<input class="input" id="available" type="number" name="available" 
									value="<?php echo $stock; ?>" disabled>
									<span class="text-uppercase">QTY: </span>
									<input name="pquantity" class="input" type="number" id="pquantity" min="0" 
											max="<?php echo $stock;?>">
								<span id="item-added"></span>
								</div>
								</form>
								<br>
							<div class="product-btns">
								<button style="background-color: darkcyan" class="primary-btn add-to-cart" onclick="add_to_cart();">
									<i class="fa fa-shopping-cart"></i> 
									Add to Cart 
								</button>
								<br>
								<br>
								<div id="show-success" class="alert alert-danger alert-dismissible" 
								style="display: none">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          							<p class="text-center text-success" id="item_added_successfully">
          								Item has been Added to Cart successfully!
          							</p>
        						</div>
							</div>
						</div>
					</div>
				<?php }
				} ?>
					<!--<div class="col-md-12">-->
					<!--	<div class="product-tab">-->
					<!--		<ul class="tab-nav">-->
					<!--			<li class="active"><a data-toggle="tab" href="#tab1">Reviews</a></li>-->
					<!--		</ul>-->
					<!--		<div class="tab-content">-->
					<!--			<div id="tab2" class="tab-pane fade in active">-->
					<!--				<div class="row">-->
										

					<!--					<div class="col-md-6">-->
					<!--						<div class="product-reviews">-->
												
												<!-- <div class="single-review">
													<div class="review-heading">
														<div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
														<div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
														<div class="review-rating pull-right">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o empty"></i>
														</div>
													</div>
													<div class="review-body">
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
															irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
													</div>
												</div>
 -->
												<!-- <ul class="reviews-pages">
													<li class="active">1</li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
												</ul> -->

					<!--						</div>-->
					<!--					</div>-->


					<!--					<div class="col-md-6">-->
					<!--						<h4 class="text-uppercase">Write Your Review</h4>-->
					<!--						<p>Your email address will not be published.</p>-->
					<!--						<form class="review-form" method="post" action="" autocomplete="on" validate>-->
					<!--							<div class="form-group">-->
					<!--								<input class="input" type="text" placeholder="Your Name" required/>-->
					<!--							</div>-->
					<!--							<div class="form-group">-->
					<!--								<input class="input" type="email" placeholder="Email Address" required/>-->
					<!--							</div>-->
					<!--							<div class="form-group">-->
					<!--								<textarea class="input" placeholder="Your review" required></textarea>-->
					<!--							</div>-->
					<!--							<div class="form-group">-->
					<!--								<div class="input-rating">-->
					<!--									<strong class="text-uppercase">Your Rating: </strong>-->
					<!--									<div class="stars">-->
					<!--										<input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>-->
					<!--										<input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>-->
					<!--										<input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>-->
					<!--										<input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>-->
					<!--										<input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>-->
					<!--									</div>-->
					<!--								</div>-->
					<!--							</div>-->
					<!--							<button class="primary-btn">Submit</button>-->
					<!--						</form>-->
					<!--					</div>-->
					<!--				</div>-->
					<!--			</div>-->
					<!--		</div>-->
					<!--	</div>-->
					<!--</div>-->

				</div>
				<!-- /Product Details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<?php //include "includes/suggested_products.php"; ?>
		<!-- /container -->
	</div>
	<!-- /section -->
<?php echo ob_get_clean(); ?>

	<!-- FOOTER -->
	<?php include "includes/footer.php"; ?>