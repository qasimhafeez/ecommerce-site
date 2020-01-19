<?php
$db['db_host'] = "localhost:3306";
$db['db_users'] = "lowpri12_admin";
$db['db_pass'] = "rootadmin";
$db['db_name'] = "lowpri12_lowcostmart";
foreach($db as $key => $value)
{
    define(strtoupper($key), $value);
}
$connection = mysqli_connect(DB_HOST, DB_USERS, DB_PASS, DB_NAME);
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
require_once BASEURL.'helpers/helpers.php';
require_once BASEURL.'vendor/autoload.php';
$cart_id = '';
if(isset($_SESSION[CART_COOKIE])){
  $cart_id = sanitize($_SESSION[CART_COOKIE]);
}
?>