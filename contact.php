<?php include "includes/header.php"; ?>
<?php include "includes/jumbotron.php" ?>
	<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				<?php //include "includes/categories.php";?>
				<!-- /category nav -->

				<!-- menu nav -->
				<?php include "includes/navigation.php";?>
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
				<li class="active">Contact Us</li>
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
                <form id="" class="clearfix" method="post" action="sendmail.php">
					<div class="col-md-6">
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Need Help? Send us Message</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="first-name" placeholder="First Name">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="last-name" placeholder="Last Name">
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email">
							</div>							
							<div class="control-group form-group">
                                <div class="controls">
                                    <label for="message">Message:</label>
                                    <textarea rows="10" cols="100" class="form-control" name="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                                </div>
                            </div>
                            <div id="success"></div>
                            <!-- For success/fail messages -->
                            <input type="submit" class="btn btn-primary" name="submit" value="Send Message">
                        </div>
                    </div>
                </form>
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