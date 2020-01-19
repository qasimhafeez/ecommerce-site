<?php
define('BASEURL', $_SERVER['DOCUMENT_ROOT'].'/lowcostmart/');
define('CART_COOKIE','SBwi72UCklwiqzz2');
define('CART_COOKIE_EXPIRE',time() + (86400 * 2));
define('TAXRATE',0); //Sales tax rate. Set to 0 if you are arn't charging tax.

define('CURRENCY', 'usd');
define('CHECKOUTMODE','LIVE'); //Change TEST to LIVE when you are ready to go LIVE

if(CHECKOUTMODE == 'TEST'){
  define('STRIPE_PRIVATE','sk_test_6IsYZqbyLjoLneDYOM0V9gAT');
  define('STRIPE_PUBLIC', 'pk_test_wY011SlnBVHf09h2AOs7mFgj');
}

if(CHECKOUTMODE == 'LIVE'){
  define('STRIPE_PRIVATE','sk_live_anOnhRaSNMrUpb4kIH8fRgxG');
  define('STRIPE_PUBLIC', 'pk_live_1Yykfla2WowXHroqgjBlKQrf');
}
