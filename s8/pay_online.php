<?php 
if( !isset($_POST['access_token']) )
	die("Invalid Request!");

include("config.php");

$site_token = $_POST['access_token'];
$token_arr  = json_decode(REQ_REPLY,true);

if( !isset($token_arr[$site_token]) )
	die("Invalid Request!");

$tran_id       = $_POST['tran_id']; 
$total_amt     = $_POST['total_amt'];

$cart      = json_decode($_POST['items']);

$tempHTML  = "";
$tempHTML .= "<script> window.onload = function(){document.getElementById('myform').submit();} </script>";
$tempHTML .= "<form id='myform' action='".SSL_REQ_LINK."' method='post'>";
$tempHTML .= "<input type='hidden' name='product_name' value='SAMSUNG GALAXY Note10'>";
$tempHTML .= "<input type='hidden' name='total_amount' value='".$total_amt."'>";
$tempHTML .= "<input type='hidden' name='store_id' value='".SSL_STORE_ID."'>";
$tempHTML .= "<input type='hidden' name='tran_id' value='".$tran_id."'>";
$tempHTML .= "<input type='hidden' name='success_url' value='".BASEURL."reply.php?act=success&token=$site_token'>";
$tempHTML .= "<input type='hidden' name='fail_url' value='".BASEURL."reply.php?act=fail&token=$site_token'>";
$tempHTML .= "<input type='hidden' name='cancel_url' value='".BASEURL."reply.php?act=cancel&token=$site_token'>";
$tempHTML .= "<input type='hidden' name='cus_name' value='".$_POST['cus_name']."'>";
$tempHTML .= "<input type='hidden' name='cus_email' value='".$_POST['cus_email']."'>";
$tempHTML .= "<input type='hidden' name='cus_phone' value='".$_POST['cus_phone']."'>";

$tempHTML .= "</form>";

echo $tempHTML;
?>