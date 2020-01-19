<!-- <?php 
	global $connection;
	$query = "SELECT * FROM banners ORDER BY rand() LIMIT 3";
	$result = mysqli_query($connection, $query);
	while($row = mysqli_fetch_assoc($result))
	{

	

?>

<?php } ?> -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner text-center">
    <div class="item active">
      <img src="img/1.jpg" alt="Los Angeles" style="max-height: 500px !important; display: inline;">
      <img src="img/2.jpg" alt="Los Angeles" style="max-height: 500px !important; display: inline;">
    </div>

    <div class="item">
      <img src="img/3.jpg" alt="Products" style="max-height: 500px !important; display: inline;">
      <img src="img/4.jpg" alt="Products" style="max-height: 500px !important; display: inline;">
    </div>

    <div class="item">
      <img src="img/5.jpg" alt="Products" style="max-height: 500px !important; display: inline;">
      <img src="img/6.jpg" alt="Products" style="max-height: 500px !important; display: inline;">
    </div>

    <div class="item">
      <img src="img/7.jpg" alt="Products" style="max-height: 500px !important; display: inline;">
      <img src="img/8.jpg" alt="Products" style="max-height: 500px !important; display: inline;">
    </div>

    <div class="item">
      <img src="img/9.jpg" alt="Products" style="max-height: 500px !important; display: inline;">
      <img src="img/10.jpg" alt="Products" style="max-height: 500px !important; display: inline;">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>