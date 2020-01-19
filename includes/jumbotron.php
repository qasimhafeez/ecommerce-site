<?php 
if(isset($_POST["submit"])){
	$string = $_POST["search"];
	$search = preg_replace('/\s+/', '', $string);
	redirect("myproducts.php?search=".$search); 

}

 ?>
<div class="jumbotron jumbotron-fluid" style="display: block;">
<!-- <div class="container"> -->
  <div class="col-md-4 col-sm-6 col-xs-6">
    <?php include "includes/logo.php"; ?><br><span class="lead hd1" style="font-size: 14px;">We Sell Items of High Quality with Low Cost</span>
  </div>
  <!-- <p class="hd1">Customer Satisfaction is our First Priority.</p> -->
  	<form class="form-inline mr-auto " method="post" action="" style="padding-top: 5px;">
            <input class="form-control" type="text" placeholder="Search" aria-label="Search" name="search" 
                    style="width: 350px;">
            <button class="btn btn-mdb-color  btn-lg my-0 ml-md fa fa-search" type="submit" name="submit"></button>
            <label for="" style="padding-left: 100px;">
              <strong class="lead hd1">Discover Your Own Favorite Products</strong>
            </label>
        </form>
<!-- </div> -->
</div>