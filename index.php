<?php include("includes/header.php");?>
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
	
	<?php include "includes/banner.php"; ?>
	<!-- section -->
		<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			
				<!-- section-title -->
					<div class="section-title">
						<h2 class="title">Products You May Like</h2>

					</div>
				<!-- /section-title -->
				<!-- Product Slick -->
				<div class="row equal-height">
					<?php 
						global $connection;
						// $query = "SELECT products.p_img, products.p_desc, stores.s_name
						// FROM products JOIN stores ON products.p_store_id = stores.s_id ORDER BY rand() LIMIT 9";
						$query = "SELECT * FROM myproducts ORDER BY rand() LIMIT 15";
						$result = mysqli_query($connection, $query);
						while ($row = mysqli_fetch_assoc($result)) {
							$id = $row["mp_id"];
							$product_img = array();
							$product_img = unserialize($row["mp_imgs"]);
							$product_desc = $row["mp_title"];
							//$store_name = $row["s_name"];
						
					
					?>
					<div class="col-xs-6 col-md-4">
						<div class="thumbnail product-body">
							<div class="product product-single">
								<div class="img-fullsize text-center">
									<?php 
				                 		for($i=0; $i<1; $i++)
				                 		{
				                 			?>
				                 			<img src="images/<?php echo $product_img[$i]; ?>" alt="<?php echo $product_desc; ?>" style="max-height: 150px !important">
				                 		<?php } ?>
								</div>
								<div class="caption">
									<p class="flex-text"><?php echo $product_desc; ?></p>
									<div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o "></i>
									</div>
									<div class="product-btns">
										<a href="product-page.php?id=<?php echo $id; ?>">
											<button class="primary-btn add-to-cart btn-disable"><i class="fa fa-shopping-cart"></i>
												View Details
											</button>
										</a>

										</span>
									</div>
								</div>
							</div>
						</div>
					</div> <!-- /.col-xs-6.col-md-3 -->
						<?php } ?>
				<!-- /Product Slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- FOOTER -->
<?php include("includes/footer.php");?>