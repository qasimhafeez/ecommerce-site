<?php
$cart_id = '';
if(isset($_COOKIE[CART_COOKIE])){
  $cart_id = sanitize($_COOKIE[CART_COOKIE]);
}
?>