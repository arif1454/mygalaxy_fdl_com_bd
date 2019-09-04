<?php

$tran_id       = $_POST['tran_id']; 
$total_amt     = $_POST['total_amt'];

$cart      = json_decode($_POST['items']);

$tempHTML  = "";
$tempHTML .= "<script> window.onload = function(){document.getElementById('myform').submit();} </script>";
$tempHTML .= "<form id='myform' action='".SSL_PAY_LINK."' method='post'>";
$tempHTML .= "<input type='hidden' name='total_amount' value='".$total_amt."'>";
$tempHTML .= "<input type='hidden' name='store_id' value='".SSL_STORE_ID."'>";
$tempHTML .= "<input type='hidden' name='tran_id' value='".$tran_id."'>";
$tempHTML .= "<input type='hidden' name='cus_name' value='".$_POST['cus_name']."'>";
$tempHTML .= "<input type='hidden' name='cus_email' value='".$_POST['cus_email']."'>";
$tempHTML .= "<input type='hidden' name='cus_phone' value='".$_POST['cus_phone']."'>";
$tempHTML .= "<input type='hidden' name='transaction_info' value=''>";
$tempHTML .= "<input type='hidden' name='val_id' value=''>";
$tempHTML .= "<input type='hidden' name='step_2_data' value=''>";
$tempHTML .= "<input type='hidden' name='step_3_data' value=''>";


$tempHTML .= "</form>";

function send_post_data( $request_url, $reply_data)
{
    $tempHTML  = "";
    $tempHTML .= "<script> window.onload = function(){document.getElementById('myform').submit();} </script>";
    $tempHTML .= "<form id='myform' action='".$request_url."' method='post'>";
    $tempHTML .= "<input type='hidden' name='reply' value='".$reply_data."'>";
	$tempHTML .= "</form>";

    echo $tempHTML;
}
?>