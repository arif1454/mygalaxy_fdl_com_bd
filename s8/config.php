<?php
    $reply_addr = array();

    $temp                = new stdClass;
    $temp->success_url   = "https://preordernote10.com/pre-order/OnlinePayment.aspx?reply=success";
    $temp->fail_url    =   "https://preordernote10.com/pre-order/Failure.aspx?reply=fail";
    $temp->cancel_url    = "https://preordernote10.com/pre-order/Failure.aspx?reply=cancel";
    $temp->emergency_url = "https://preordernote10.com/pre-order/OnlinePayment.aspx?reply=emergency";
    $reply_addr['ZA456asd74d897897'] = $temp; 


    define('BASEURL',             "http://estore.fdl.com.bd/s8/");

    
 /* define('SSL_REQ_LINK',          "https://sandbox.sslcommerz.com/gwprocess/v3/process.php");
    define('SSL_VALIDATION_LINK', "https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php");
    define('SSL_STORE_ID',        "test_samsungfdl001");
    define('SSL_STORE_PASSWORD',  "test_samsungfdl001@ssl"); 
    */
    
    define('SSL_REQ_LINK',        "https://securepay.sslcommerz.com/gwprocess/v3/process.php");
	define('SSL_PAY_LINK',        "https://preordernote10.com/pre-order/OnlinePayment.aspx");
	define('SSL_TEST_LINK',       "https://preordernote10.com/pre-order/test.aspx");
    define('SSL_VALIDATION_LINK', "https://securepay.sslcommerz.com/validator/api/validationserverAPI.php");
    define('SSL_STORE_ID',        "estore001live");
    define('SSL_STORE_PASSWORD',  "estore001live71657");
   

    define('REQ_REPLY',           json_encode($reply_addr) );    
?>