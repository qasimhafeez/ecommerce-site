<?php include "includes/header.php"; ?>

<!-- HEADER -->
<header>
		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
					<?php include "includes/logo.php"; ?>
					</div>
					
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
				<li class="active">Products</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <?php //Get the FAQ Dynamically ?>

			 <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" 
                                   href="#collapse<?php //echo //$count; ?>">
                                    <?php //echo //$question; ?>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse<?php //echo //$count; ?>" class="panel-collapse collapse">
                            <div class="panel-body">
                                <?php //echo //$answer; ?>
                            </div>
                        </div>
                    </div>
                    
                <?php 
                    //     $count++;
                    // }
                ?>
                    
                    <!-- /.panel -->
                </div>
            
        </div>
    </div>
</div>