<?php include("includes/header.php");
	if(!isset($_SESSION["user_id"]))
	{
		header("Location: index.php");
  }
  $uid = $_SESSION["user_id"];
?>
<?php include "includes/jumbotron.php" ?>

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
<?php
    global $connection;
    $query = "SELECT * from purchases where pu_id = {$uid}";
    $result = mysqli_query($connection, $query);
    $i = 1;
    $sub_total = 0;
    $item_count = 0;
  
 ?>
 <div class="col-md-12" style="background-color: white;">
   <div class="row" style="margin-bottom: 111px">
      <h2 class="text-center" style="margin-top: 100px;">Purchases</h2><hr>
      <?php if(!(mysqli_num_rows($result) > 1)): ?>
        <div class="alert alert-danger alert-dismissible">
          <p class="text-center text-danger">
            You have not purchased anything yet!
          </p>
        </div>
        <div style="padding-bottom: 200px;"></div>
      <?php else: ?>
      <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-12">
        <table class="table table-bordered table-condensed table-striped">
          <thead><th>#</th><th>Item</th><th>Quantity</th><th>Item Price</th><th>Total Price</th><th>Purchased on</th><th>Status</th></thead>
          <tbody>
      
      <?php 
          while($row = mysqli_fetch_assoc($result))
          {
            $items = json_decode($row["p_items"], true);
            $status = $row["p_status"];
            $date = $row["p_date"];
          
      ?>
            <?php
              foreach($items as $item){
                $product_id = $item['id'];
                global $connection;
                $query = "SELECT * FROM myproducts WHERE mp_id = '{$product_id}'";
                $productQ = mysqli_query($connection, $query);
                $product = mysqli_fetch_assoc($productQ);
                ?>
                <tr>
                  <td><?=$i;?></td>
                  <td><?=$product['mp_title'];?></td>
                  <td><?=$item["quantity"];?></td>
                  <td><?=$product["mp_new_price"];?></td>
                  <td><?=money($item['quantity'] * $product['mp_new_price']);?></td>
                  <td><?=$row["p_date"];?></td>
                  <td><?=$row["p_status"];?></td>
                </tr>
              <?php
                $i++;
              }
             } ?>
          </tbody>
        </table>
        </div>
      </div>
      </div>
        <!-- <table class="table table-bordered table-condensed text-right">
          <legend>Totals</legend>
          <thead class="totals-table-header"><th>Total Items</th><th>Sub Total</th><th>Tax</th><th>Grand Total</th></thead>
          <tbody>
            <tr>
              <td><?=$item_count;?></td>
              <td><?=money($sub_total);?></td>
              <td><?=money($tax);?></td>
              <td class="bg-success"><?=money($grand_total);?></td>
            </tr>
          </tbody>
        </table> -->
      <?php endif; ?>
    </div>
 </div>
 <?php include 'includes/footer.php'; ?>
