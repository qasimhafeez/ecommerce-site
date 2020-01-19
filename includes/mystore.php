<div id="store" class="container">

	<!-- row -->
	<div class="row equal-height">

<?php
	global $connection;
	$query = "";
	if(isset($_GET["cid"]))
	{
		$id = $_GET["cid"];
		$query = "SELECT mp_imgs, mp_title, mp_new_price, mp_id
				FROM myproducts where mp_cat = $id LIMIT 21" ;	
	}
	elseif (isset($_GET["search"])) {
		$search = $_GET["search"];
		$query = "SELECT mp_imgs, mp_title, mp_new_price, mp_id FROM myproducts 
					WHERE mp_title LIKE '%".$search."%'";	
	}
	else
	{
		$query = "SELECT mp_imgs, mp_title, mp_new_price, mp_id
				FROM myproducts LIMIT 21";
	}


?>


<?php 
	
	
	$result = mysqli_query($connection, $query);
	if (!mysqli_num_rows($result)) {
		echo '<h3 class="text-danger">No Product Found!</h3>';
	}
	else
	{
	while ($row = mysqli_fetch_assoc($result)) {
		$product_img = array();
		$product_img = unserialize($row["mp_imgs"]);
		$product_desc = $row["mp_title"];
		$price = $row["mp_new_price"];
		$id = $row["mp_id"];

	

 ?>
        <div class="col-xs-6 col-md-4">
            <div class=" product-body">
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
					</div>
                </div>
            </div>
            </div>
        </div> <!-- /.col-xs-6.col-md-3 -->




		<!-- Products -->
		
		<!-- /Products -->
<?php } 
}?>
	<!-- /row -->
</div>

</div>

