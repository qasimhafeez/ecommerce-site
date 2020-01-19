<div class="menu-nav">
	<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
	<ul class="menu-list">
		<li><a href="index.php">Home</a></li>
		<li><a href="deals-of-the-day.php">Deals of the Day</a></li>
		<li><a href="new-arrivals.php">New Arrivals</a></li>
		<?php
		if (isset($_SESSION["user_role"])) {
			?>
			<li class="dropdown navbar-right">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
					Account
					<b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li>
						<!-- <a href="user-details.php?user=<?php echo $_SESSION["user_id"]; ?>"> -->
						<a href="user-details.php">
							<i class=""></i> <?php echo $_SESSION["username"]; ?></a>
					</li>
					<li>
						<a href="user-purchases.php">
							<i class=""></i>Purchases
						</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
					</li>
				</ul>
			</li>
		<?php
		} else {
			?>
			<li class="navbar-right"><a href="login.php">Login</a></li>
			<li class="navbar-right"><a href="sign-up.php">Sign up</a></li>
		<?php
		}
		?>
		<li class="header-cart navbar-right">
			<a class="btn-lg" href="cart.php">
				<div class="header-btns-icon">
					<i class="fa fa-shopping-cart"></i>
					<?php
					if (isset($_SESSION["items"])) {
						echo '<span class="badge">' . $_SESSION["items"] . '</span>';
					}
					?>
				</div>
			</a>
		</li>
	</ul>
</div>