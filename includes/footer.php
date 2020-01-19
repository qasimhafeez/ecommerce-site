	<footer id="footer" class="section gradient footer" style="margin-bottom: -20px;">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- footer widget -->
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="footer">
						<!-- footer logo -->
						<div class="footer-logo">
							<?php include "includes/logo.php";?>
						</div>
						<!-- /footer logo -->

						<h5 class="white">No Compromise on Quality</h5>
						<h5 class="white">Buy Here and Save your Money!!!</h5>

						<!-- footer social -->
						
						<!-- /footer social -->
					</div>
				</div>
				<!--footer widget -->

				<!-- footer widget -->
				<!-- <div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header white">My Account</h3>
						<ul class="list-links">
							<li><a href="#" class="white">My Account</a></li>
							<li><a href="#" class="white">My Wishlist</a></li>
							<li><a href="#" class="white">Compare</a></li>
							<li><a href="#" class="white">Checkout</a></li>
							<li><a href="#" class="white">Login</a></li>
						</ul>
					</div>
				</div> -->
				<!-- /footer widget -->

				<div class="clearfix visible-sm visible-xs"></div>

				<!-- footer widget -->
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="footer">
						<h3 class="footer-header white">Customer Service</h3>
						<ul class="list-links">
							<li><a href="about.php" class="white">About Us</a></li>
							<li><a href="shipping-return.php" class="white">Shipping & Return Policy</a></li>
							<li><a href="products.php" class="white">Amazom Store Products</a></li>
							<!-- <li><a href="shipping-guide.php" class="white">Shiping Guide</a></li> -->
							<li><a href="contact.php" class="white">Contact Us</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer subscribe -->
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="footer">
						<h3 class="footer-header white">Stay Connected</h3>
						<p>You can also connect with us via social media to check the regular updates about products and find out the deals.</p>
					</div>
					<ul class="footer-social">
							<li><a href="https://www.facebook.com/Lowcostmart-2178780909063401/?ref=bookmarks" class="white"><i class="fa fa-facebook"></i></a></li>
							<!--<li><a href="#" class="white"><i class="fa fa-twitter"></i></a></li>-->
							<!--<li><a href="#" class="white"><i class="fa fa-instagram"></i></a></li>-->
							<!--<li><a href="#" class="white"><i class="fa fa-google-plus"></i></a></li>-->
							<!--<li><a href="#" class="white"><i class="fa fa-pinterest"></i></a></li>-->
						</ul>
				</div>
				<!-- /footer subscribe -->
			</div>
			<!-- /row -->
			<hr>
			<!-- row -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<!-- footer copyright -->
					<div class="footer-copyright">
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
					</div>
					<!-- /footer copyright -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/validate.js"></script>
	<script>


		function update_cart(mode,edit_id,edit_size){
		   var data = {"mode" : mode, "edit_id" : edit_id, "edit_size" : edit_size};
		   jQuery.ajax({
		     url : '/handler/parsers/update_cart.php',
		     method : "post",
		     data : data,
		     success : function(){location.reload();},
		     error : function(){alert("Something went wrong.");},
		   });
		 }
	
		 var cartItems = 0;

		 function add_to_cart(){
		  jQuery('#item-added').html("");
		  //var size = jQuery('#size').val();
		  var quantity = jQuery('#pquantity').val();
		  var available = jQuery('#available').val();
		  var id = jQuery('#cart_product_id').val();
		  var error = '';
		  var data = jQuery('#add_product_form').serialize();
		  if(quantity == '' || quantity == 0){
		    error += '<p class="text-danger text-center">You must choose a quantity.</p>';
		    jQuery('#item-added').html(error);
		    return;
		  }
		  else{
			  cartItems ++;
		    jQuery.ajax({
		      url : 'add_cart.php',
		      method : 'post',
		      data : data,
		      success : function(){
		      	//jQuery("#show-success").css("display: block");
        		//jQuery("item_added_successfully").html(msg);
		        location.reload();
		      },
		      error : function(){alert("Something went wrong");}
		    });
		  }
		 }


	</script>

</body>

</html>
