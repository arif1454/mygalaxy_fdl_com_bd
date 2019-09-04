 
   <?php
$usernm="note7";
$passwd="umetejyte";
$host="localhost";
$database="fdltesting_note7";

mysql_connect($host,$usernm,$passwd); 
mysql_select_db($database);

 $sql = 'SELECT tid, val_id, step_2_data, step_3_data, status, created_on FROM transaction_info ORDER BY created_on DESC 
  			LIMIT 1';
$result = mysql_query($sql) or die (mysql_error()); // dont put spaces in between it, else your code wont recognize it the query that needs to be executed
while ($row = mysql_fetch_array($result)){     // here too, you put a space between it
     $tran_id=$row['tid'];
    $val_id=$row['val_id'];
    $tran_info=$row['step_2_data'];
    }
?>
<form action="thanks.php" method="post">
  Name
  <input type="text" name= "Name" value= "<?php echo $row['tid']; ?> "size=10>
  Username
  <input type="text" name= "Username" value= "<?php echo $row['val_id']; ?> "size=10>
  Password
  <input type="text" name= "Password" value= "<?php echo $row['step_2_data']; ?>" size=17>
  <input type="submit" name= "submit" value="Update">
</form>