<div id="store" class="container">

	<!-- row -->
	<div class="row equal-height">

<?php 
	
	global $connection;
	$query = "SELECT products.p_id, products.p_img, products.p_desc, stores.s_name	FROM products JOIN stores ON products.p_store_id = stores.s_id
				ORDER BY products.p_id DESC";
	$result = mysqli_query($connection, $query);
	while ($row = mysqli_fetch_assoc($result)) {
		$i = 3;
		$product_img = $row["p_img"];
		$product_desc = $row["p_desc"];
		$store_name = $row["s_name"];

	

 ?>
        <div class="col-xs-6 col-md-4">
            <div class="thumbnail product-body">
            	<div class="product product-single">
                 <div class="img-fullsize">
                 	<?php echo $product_img; ?>
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
						<span class="primary-btn add-to-cart btn-disable"><i class="fa fa-shopping-cart"></i> 
							<!-- Store Name -->
							<?php echo $store_name; ?>

						</span>
					</div>
                </div>
            </div>
            </div>
        </div> <!-- /.col-xs-6.col-md-3 -->




		<!-- Products -->
		
		<!-- /Products -->
<?php } ?>
	<!-- /row -->
</div>

</div>

