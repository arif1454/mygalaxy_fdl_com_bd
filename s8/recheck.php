<?php
include("config.php");
include("table.php");

$db = new DB_Table();

if( !isset($_GET['token'])  )
    die("Invalid URL!");

$site_token = $_GET['token'];
$token_arr  = json_decode(REQ_REPLY, true);
if( !isset($token_arr[$site_token]) )
    die("Invalid Request!");

validate_data( $_GET['val_id'], $site_token, $db );

function send_post_data( $request_url, $reply_data )
{
    $tempHTML  = "";
    $tempHTML .= "<script> window.onload = function(){document.getElementById('myform').submit();} </script>";
    $tempHTML .= "<form id='myform' action='".$request_url."' method='post'>";
    $tempHTML .= "<input type='hidden' name='reply' value='".$reply_data."'>";
    $tempHTML .= "</form>";

    echo $tempHTML;
}

function validate_data( $valID, $site_token, $db, $retry_count=0 )
{
    $token_arr  = json_decode( REQ_REPLY, true );
    
    if( $retry_count == 2 || empty($valID) )
    {
        $data            = array();
        $data['comment'] = "Something Went Wrong";
        $where = array('val_id'=>$valID);
        
        $db->setUpdateQuery( $data, $where, 'transaction_info');
        $db->runQuery();

        header('Location: '.$token_arr[$site_token]['emergency_url']);
        die();
    }

    $val_id        = urlencode($valID); 
    $store_id      = urlencode(SSL_STORE_ID); 
    $store_passwd  = urlencode(SSL_STORE_PASSWORD); 
    $requested_url = SSL_VALIDATION_LINK."?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=3&format=json"; 

    $handle        = curl_init(); 
    curl_setopt($handle, CURLOPT_URL,$requested_url); 
    curl_setopt($handle, CURLOPT_RETURNTRANSFER,true); 
    curl_setopt($handle, CURLOPT_SSL_VERIFYHOST,false); 
    curl_setopt($handle, CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 2000);

    $reply_json = curl_exec($handle); 
    $code       = curl_getinfo($handle);
    $code       = curl_getinfo($handle, CURLINFO_HTTP_CODE);   

    if( $code == 200 && !( curl_errno($handle)) ) 
    {
        $result = json_decode($reply_json);
        
        if( $result->status == "VALID" || $result->status == "VALIDATED" )
        {
            $data                = array();
            $data['status']      = 1;
            $data['step_3_data'] = json_encode($result);
            $where = array('val_id'=>$valID);
            
            $db->setUpdateQuery( $data, $where, 'transaction_info');
            $db->runQuery();
            send_post_data( $token_arr[$site_token]['success_url'], json_encode($result) );
        }else{
            send_post_data( $token_arr[$site_token]['fail_url'], json_encode($result) );
        }
    }else{
        validate_data( $valID, $site_token, $db, ++$retry_count);
    }
}
?>