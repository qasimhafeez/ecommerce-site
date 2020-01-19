<?php
  include "includes/db.php";
  $product_id = sanitize($_POST['pid']);
  $quantity = sanitize($_POST['pquantity']);
  $available = sanitize($_POST['available']);
  $item = array();
  $item[] = array(
    'id'        => $product_id,
    'quantity'  => $quantity,
  );
  
  $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
  global $connection;
  $query = "SELECT * FROM myproducts WHERE mp_id = '{$product_id}'";
  $result = mysqli_query($connection, $query);
  $product = mysqli_fetch_assoc($query);
  $_SESSION['success_flash'] = $product['mp_title']. ' was added to your cart.';
  
  if($cart_id != ''){
    global $connection;
    $query = "SELECT * FROM cart WHERE id = '{$cart_id}'";
    $cartQ = mysqli_query($connection, $query);
    $cart = mysqli_fetch_assoc($cartQ);var_dump($cart);
    $previous_items = json_decode($cart['items'],true);
    $item_match = 0;
    $new_items = array();
    foreach($previous_items as $pitem){
      if($item[0]['id'] == $pitem['id']){
        $pitem['quantity'] = $pitem['quantity'] + $item[0]['quantity'];
        if($pitem['quantity'] > $available){
          $pitem['quantity'] = $available;
        }
        $item_match = 1;
      }
      $new_items[] = $pitem;
    }
    if($item_match != 1){
      $new_items = array_merge($item,$previous_items);
    }
  $items_json = json_encode($new_items);
  $cart_expire = date("Y-m-d H:i:s",strtotime("+30 days"));
  global $connection;
  $query= "UPDATE cart SET items = '{$items_json}', expire_date = '{$cart_expire}' WHERE id = '{$cart_id}'";
  $result = mysqli_query($connection, $query);
  //setcookie(CART_COOKIE,'',1,"/",$domain,false);
  $_SESSION[CART_COOKIE] = $cart_id;
  $_SESSION["items"]++;
  //setcookie(CART_COOKIE,$cart_id,CART_COOKIE_EXPIRE,'/',$domain,false);
  }else{
    $items_json = json_encode($item);
    $cart_expire = date("Y-m-d H:i:s",strtotime("+30 days"));
    global $connection;
    $query = "INSERT INTO cart (items,expire_date) VALUES ('{$items_json}','{$cart_expire}')";
    $cart_id = mysqli_query($connection, $query);
    $cart_id = mysqli_insert_id($connection);
    $_SESSION[CART_COOKIE] = $cart_id;
    $_SESSION["items"] = 1;
    //setcookie(CART_COOKIE,$cart_id,CART_COOKIE_EXPIRE,'/',$domain,false);
  }
?>
