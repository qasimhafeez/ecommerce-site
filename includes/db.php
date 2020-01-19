<?php
$db['db_host'] = "localhost";
$db['db_users'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "lowcostmart";
foreach($db as $key => $value)
{
    define(strtoupper($key), $value);
}
$connection = mysqli_connect(DB_HOST, DB_USERS, DB_PASS, DB_NAME);
ob_start();
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/lowcostmart/config.php';
require_once BASEURL.'helpers/helpers.php';
require_once BASEURL.'vendor/autoload.php';
$cart_id = '';
if(isset($_SESSION[CART_COOKIE])){
  $cart_id = sanitize($_SESSION[CART_COOKIE]);
}
?>