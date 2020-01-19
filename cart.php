<?php include("includes/header.php");?>
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

  if($cart_id != ''){
   global $connection;
    $query = "SELECT * FROM  cart WHERE id = '{$cart_id}'";
    $cartQ = mysqli_query($connection, $query);
    $result = mysqli_fetch_assoc($cartQ);
    $items = json_decode($result['items'],true);
    //echo $items;
    $i = 1;
    $sub_total = 0;
    $item_count = 0;
  }
 ?>
 <div class="col-md-12" style="background-color: white;">
   <div class="row">
      <h2 class="text-center" style="padding-top: 20px;">My Shopping Cart</h2><hr>
      <?php if($cart_id == ''): ?>
        <div class="alert alert-danger alert-dismissible">
          <p class="text-center text-danger">
            Your shopping cart is empty!
          </p>
        </div>
        <div style="padding-bottom: 200px;"></div>
      <?php else: ?>
        <table class="table table-bordered table-condensed table-striped">
          <thead><th>#</th><th>Item</th><th>Price</th><th>Quantity</th><th>Sub Total</th></thead>
          <tbody>
            <?php
              foreach($items as $item){
                $product_id = $item['id'];
                global $connection;
                $query = "SELECT * FROM myproducts WHERE mp_id = '{$product_id}'";
                $productQ = mysqli_query($connection, $query);
                $product = mysqli_fetch_assoc($productQ);
                //$sArray = explode(',',$product['sizes']);
                // foreach($sArray as $sizeString){
                //   $s = explode(':',$sizeString);
                //   if($s[0] == $item['size']){
                //     $available = $s[1];
                //   }
                // }
                ?>
                <tr>
                  <td><?=$i;?></td>
                  <td><?=$product['mp_title'];?></td>
                  <td><?=$product['mp_new_price'];?></td>
                  <td>
                    <!-- <button class="btn btn-xs btn-default" onclick="update_cart('removeone','<?=$product['mp_id'];?>','<?=$item['size'];?>');">-</button> -->
                    <?=$item['quantity'];?>
                    <!-- <?php if($item['quantity'] < $available): ?>
                      <button class="btn btn-xs btn-default" onclick="update_cart('addone','<?=$product['mp_id'];?>','<?=$item['size'];?>');">+</button>
                    <?php else: ?>
                      <span class="text-danger">Max</span>
                    <?php endif; ?> -->
                  </td>
                  <!-- <td><?=$item['size'];?></td> -->
                  <td><?=money($item['quantity'] * $product['mp_new_price']);?></td>
                </tr>
              <?php
                $i++;
                $item_count += $item['quantity'];
                $sub_total += ($product['mp_new_price'] * $item['quantity']);
              }
              $tax = TAXRATE * $sub_total;
              $tax = number_format($tax,2);
              $grand_total = $tax + $sub_total;
               ?>
          </tbody>
        </table>
        <table class="table table-bordered table-condensed text-right">
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
        </table>
<!--Check Out Button -->
<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#checkoutModal">
<span class="glyphicon glyphicon-shopping-cart"></span>  Check Out >>
</button>

<!-- Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="checkoutModalLabel">Shipping Address</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <form action="thankYou.php" method="post" id="payment-form">
            <span class="bg-danger" id="payment-errors"></span>
            <input type="hidden" name="tax" value="<?=$tax;?>">
            <input type="hidden" name="sub_total" value="<?=$sub_total;?>">
            <input type="hidden" name="grand_total" value="<?=$grand_total;?>">
            <input type="hidden" name="cart_id" value="<?=$cart_id;?>">
            <input type="hidden" name="description" value="<?=$item_count.' item'.(($item_count>1)?'s':'').' from Shauntas Boutique.';?>">
            <div id="step1" style="display:block;">
              <div class="from-group col-md-6">
                <label for="full_name">Full Name:</label>
                <input class="form-control" id="full_name" name="full_name" type="text">
              </div>
              <div class="from-group col-md-6">
                <label for="eamil">Email:</label>
                <input class="form-control" id="email" name="email" type="email">
              </div>
              <div class="from-group col-md-6">
                <label for="street">Street Address:</label>
                <input class="form-control" id="street" name="street" type="text" data-stripe="address_line1">
              </div>
              <div class="from-group col-md-6">
                <label for="street2">Street Address 2:</label>
                <input class="form-control" id="street2" name="street2" type="text" data-stripe="address_line2">
              </div>
              <div class="from-group col-md-6">
                <label for="city">City:</label>
                <input class="form-control" id="city" name="city" type="text" data-stripe="address_city">
              </div>
              <div class="from-group col-md-6">
                <label for="state">State:</label>
                <input class="form-control" id="state" name="state" type="text" data-stripe="address_state">
              </div>
              <div class="from-group col-md-6">
                <label for="zip_code">Zip Code:</label>
                <input class="form-control" id="zip_code" name="zip_code" type="text" data-stripe="address_zip">
              </div>
              <div class="from-group col-md-6">
                <label for="country">Country:</label>
                <input class="form-control" id="country" name="country" type="text" data-stripe="address_country">
              </div>
            </div>
            <div id="step2" style="display:none;">
              <div class="form-group col-md-3">
                <label for="name">Name on Card:<label>
                <input type="text" id="name" class="form-control" data-stripe="name">
              </div>
              <div class="form-group col-md-3">
                <label for="number">Card Number:<label>
                <input type="text" id="number" class="form-control" data-stripe="number">
              </div>
              <div class="form-group col-md-2">
                <label for="cvc">CVC:<label>
                <input type="text" id="cvc" class="form-control" data-stripe="cvc">
              </div>
              <div class="form-group col-md-2">
                <label for="exp-month">Expire Month:</label>
                <select id="exp-month" class="form-control" data-stripe="exp_month">
                  <option value=""></option>
                  <?php for($i=1;$i < 13; $i++): ?>
                    <option value="<?=$i;?>"><?=$i;?></option>
                  <?php endfor; ?>
                </select>
              </div>
              <div class="form-group col-md-2">
                <label for="exp-year">Expire Year:</label>
                <select id="exp-year" class="form-control" data-stripe="exp_year">
                  <option value=""></option>
                  <?php $yr = date("Y");?>
                  <?php for($i=0;$i<11; $i++): ?>
                    <option value="<?=$yr+$i;?>"><?=$yr+$i;?></option>
                  <?php endfor; ?>
                </select>
              </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="check_address();" id="next_button">Next >></button>
        <button type="button" class="btn btn-primary" onclick="back_address();" id="back_button" style="display:none;"><< Back</button>
        <button type="submit" class="btn btn-primary" id="checkout_button" style="display:none;">Check Out >></button>
        </form>
      </div>
    </div>
  </div>
</div>
      <?php endif; ?>
    </div>
 </div>
<script>
  function back_address(){
    jQuery('#payment-errors').html("");
    jQuery('#step1').css("display","block");
    jQuery('#step2').css("display","none");
    jQuery('#next_button').css("display","inline-block");
    jQuery('#back_button').css("display","none");
    jQuery('#checkout_button').css("display","none");
    jQuery('#checkoutModalLabel').html("Shipping Address");
  }

  function check_address(){
    var data = {
      'full_name' : jQuery('#full_name').val(),
      'email' : jQuery('#email').val(),
      'street' : jQuery('#street').val(),
      'street2' : jQuery('#street2').val(),
      'city' : jQuery('#city').val(),
      'state' : jQuery('#state').val(),
      'zip_code' : jQuery('#zip_code').val(),
      'country' : jQuery('#country').val(),
    };
    jQuery.ajax({
      url : 'handler/parsers/check_address.php',
      method : 'POST',
      data : data,
      success : function(data){
        if(data != 'passed'){
          jQuery('#payment-errors').html(data);
        }
        if(data == 'passed'){
          jQuery('#payment-errors').html("");
          jQuery('#step1').css("display","none");
          jQuery('#step2').css("display","block");
          jQuery('#next_button').css("display","none");
          jQuery('#back_button').css("display","inline-block");
          jQuery('#checkout_button').css("display","inline-block");
          jQuery('#checkoutModalLabel').html("Enter Your Card Details");
        }
      },
      error : function(){alert("Somethinsg Went Wrong");},
    });
  }

  Stripe.setPublishableKey('<?=STRIPE_PUBLIC;?>');

  function stripeResponseHandler(status, response) {
  var $form = $('#payment-form');

  if (response.error) {
    // Show the errors on the form
    $form.find('#payment-errors').text(response.error.message);
    $form.find('button').prop('disabled', false);
  } else {
    // response contains id and card, which contains additional card details
    var token = response.id;
    // Insert the token into the form so it gets submitted to the server
    $form.append($('<input type="hidden" name="stripeToken" />').val(token));
    // and submit
    $form.get(0).submit();
  }
};

  jQuery(function($) {
  $('#payment-form').submit(function(event) {
    var $form = $(this);

    // Disable the submit button to prevent repeated clicks
    $form.find('button').prop('disabled', true);

    Stripe.card.createToken($form, stripeResponseHandler);

    // Prevent the form from submitting with the default action
    return false;
  });
});
</script>

 <?php include 'includes/footer.php'; ?>
