<?php
    $reply_addr = array();

    $temp                = new stdClass;
    $temp->success_url   = "http://202.84.32.34:800/pre-order/Prebooking/OnlinePayment.aspx?reply=success";
      $temp->fail_url    = "http://202.84.32.34:800/Pre-Order/Prebooking/Failure.aspx?reply=fail";
    $temp->cancel_url    = "http://202.84.32.34:800/Pre-Order/Prebooking/Failure.aspx?reply=cancel";
    $temp->emergency_url = "http://202.84.32.34:800/Pre-Order/Prebooking/OnlinePayment.aspx?reply=emergency";
    $reply_addr['ZA456asd74d897897'] = $temp; 


    define('BASEURL',             "http://estore.fdl.com.bd/s8/");

    
  /*  define('SSL_REQ_LINK',        "https://sandbox.sslcommerz.com/gwprocess/v3/process.php");
    define('SSL_VALIDATION_LINK', "https://securepay.sslcommerz.com/validator/api/validationserverAPI.php");
    define('SSL_STORE_ID',        "test_samsungfdl001");
    define('SSL_STORE_PASSWORD',  "test_samsungfdl001@ssl"); */
    
    
    define('SSL_REQ_LINK',        "https://securepay.sslcommerz.com/gwprocess/v3/process.php");
	define('SSL_PAY_LINK',        "http://preordernote8.com/pre-order/Prebooking/OnlinePayment.aspx");
	define('SSL_TEST_LINK',       "http://preordernote8.com/pre-order/Prebooking/test.aspx");
    define('SSL_VALIDATION_LINK', "https://securepay.sslcommerz.com/validator/api/validationserverAPI.php");
    define('SSL_STORE_ID',        "estore001live");
    define('SSL_STORE_PASSWORD',  "estore001live71657");
   

    define('REQ_REPLY',           json_encode($reply_addr) );    
?>