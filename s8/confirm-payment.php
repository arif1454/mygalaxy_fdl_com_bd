<?php
include("config.php");
   $dbhost = 'localhost';
   $dbuser = 'note7';
   $dbpass = 'umetejyte';
   
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = 'SELECT tid, val_id, step_2_data, step_3_data, status, created_on FROM transaction_info ORDER BY created_on DESC 
  			LIMIT 1';
   			
   mysql_select_db('fdltesting_note7');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   $tran_id = $row['tid'];
   
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
	   
	     /* echo '<form name="myform" action="thanks.php" method="POST">';
     	  echo '<input type="hidden" name="tran_id" value="'. $row['tid'] .'">'; 
		  echo '<input type="hidden" name="val_id" value="'. $row['val_id'] .'">';
		  echo '<input type="hidden" name="tran_info" value="'. $row['step_2_data'] .'">';
		  echo '<input type="hidden" name="step_3_data" value="'. $row['step_3_data'] .'">'; 
		  echo '<input type="hidden" name="status" value="'. $row['status'] .'">';
		  echo '<input type="hidden" name="payment_date" value="'. $row['created_on'] .'">';
		  echo '<script> if (document.getElementById("tran_id").value = "'. $row['tid'] .'"){window.onload = function(){ window.document.myform.submit(); }} </script>';*/
		   $tran_id=$row['tid'];
    $val_id=$row['val_id'];
    $tran_info=$row['step_2_data'];
		    
   }
   
   mysql_close($conn);
   ?>

<!--<script> window.onload = function(){document.getElementById('myform').submit();} </script>
<form action="thanks.php" method="post" id='myform'>
<input type="text" name="tran_id" value="<?php isset( $row['tid']) ?>" />
<input type="submit" name="send" />
</form>-->
