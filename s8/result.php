
  <?php
        session_start();
        $usernm="note7";
        $passwd="umetejyte";
        $host="localhost";
        $database="fdltesting_note7";

        $Username=$_SESSION['myssession'];



        mysql_connect($host,$usernm,$passwd);

        mysql_select_db($database);

        $sql = 'SELECT tid, val_id, step_2_data, step_3_data, status, created_on FROM transaction_info ORDER BY created_on DESC 
  			LIMIT 1';
        $result = mysql_query ($sql) or die (mysql_error ());
        while ($row = mysql_fetch_array ($result)){

        ?>
<script> window.onload = function(){document.getElementById('myform').submit();} </script>
        <form id='myform' action="thanks.php" method="post" >
        
            
            <input type="hidden" name="tran_id" value="<?php echo  $row['tid'] ?> ">
            <input type="hidden" name="val_id"  value="<?php echo  $row['val_id'] ?> ">
            <input type="hidden" name="tran_info" value="<?php echo  $row['step_2_data']?>">
            <input type="hidden" name="step_3_data" value="<?php echo  $row['step_3_data'] ?>">
            <input type="hidden" name="status" value="<?php echo  $row['status'] ?>">
            <input type="hidden" name="payment_date" value="<?php echo  $row['created_on'] ?>">
                       
                       
                       
         <input type="submit" name="submit" value="Update">
        </form>
        <?php
        }
        ?>
 