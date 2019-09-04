<?php 

$serverName = "192.168.1.232";
$connectionOptions = array(
    "Database" => "Prebook",
    "Uid" => "shahdul",
    "PWD" => "Aa123456"
    );
//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);
if($conn)
    echo "Connected!"
	
	
    
    public function setQueryString( $qry )
    {
        $this->myqry = $qry;
    }
    
    
    public function getQueryString()
    {
        return $this->myqry;
    }
        
    
    public function selectColumns( $cols )
    {
        $str = "";
        foreach( $cols as $key=>$val )
            $str .= "`".$val."` AS `".$key."`, ";   
        
        return substr($str, 0, -2)." ";
    }
    
    
    public function setSelectQuery( $columns, $where, $tableName, $order = "", $limit = "" )
    {        
        $whereStr = "";
        $limitStr = "";
        $orderStr = "";
        
        if( !empty($order))
            $orderStr = $order; 
            
        if( !empty($limit) )
            $limitStr = $limit;
        
        $qry = "SELECT ".$columns." FROM (".$tableName.") ".$where." ".$orderStr." ".$limitStr;
        
        $this->myqry = $qry;        
    } 
      
    
    public function setSearchQuery( $columns, $where, $tableName, $order = "", $limit = "" )
    {        
        $whereStr = "";
        $limitStr = "";
        $orderStr = "";
          
        if( !empty($where))
        {
            $whereStr .= "WHERE ";
            
            foreach( $where as $key => $val )
            {                
               $whereStr .="`".$key."` LIKE '%".$val."%' AND ";     
            }
            
            $whereStr  = substr($whereStr, 0, -4);
        }        
        
        if( !empty($order))
            $orderStr = $order; 
            
        if( !empty($limit) )
            $limitStr = $limit;
        
        $qry = "SELECT ".$columns." FROM ".$tableName." ".$whereStr." ".$orderStr." ".$limitStr;
        
        $this->myqry = $qry;        
    }
    
        
    public function setInsertQuery( $data , $tableName )
    {
        $columns = "";
        $values  = "";
        
        foreach( $data as $key => $val )
        {
            
           $columns .="`".$key."`, "; 
           $values  .="'".$val."', ";    
        }
        
        $columns = substr($columns, 0, -2); 
        $values  = substr($values, 0, -2);
        
        $qry = "INSERT INTO `".$tableName."` (".$columns.") VALUES (".$values.")";
        
        $this->myqry = $qry;
    } 
    
    
    public function setUpdateQuery( $data , $where, $tableName )
    {
        $values    = "";
        $whereStr  = "";
        
        foreach( $data as $key => $val )
        {
           $values .="`".$key."` = '".$val."', ";     
        }
        
        $values  = substr($values, 0, -2);
        
        $whereStr .= "WHERE ";
        
        foreach( $where as $key => $val )
        {                
           $whereStr .="`".$key."` = '".$val."' AND";     
        }
        
        $whereStr  = substr($whereStr, 0, -3);             
        
        $qry = "UPDATE `".$tableName."` SET ".$values." ".$whereStr;
        
        $this->myqry = $qry;
    }
    
    
    public function setDeleteQuery( $where, $tableName )
    {
        $whereStr  = "";
        
        $whereStr .= "WHERE ";
        
        foreach( $where as $key => $val )
        {                
           $whereStr .="`".$key."` = '".$val."' AND";     
        }
        
        $whereStr  = substr($whereStr, 0, -4);
        
        $qry = "DELETE FROM `".$tableName."` ".$whereStr;
        $this->myqry = $qry;
    }
    
    
    public function getResult($utf8 = false)
    {   
        $this->makeConnection();
        
        if( $utf8 ) $this->mysqli->query("SET NAMES utf8");
        
        $objs = array();
        
        if ($result = $this->mysqli->query($this->myqry)) {
                        
            while ( $obj = $result->fetch_object() )
                $objs[] = $obj;              
            
            $result->close();
        } 
        
        if( !empty( $this->mysqli->error ) ) 
            echo $this->mysqli->error;
                     
        $this->mysqli->close();
        
        return $objs;
    }
    
    
    public function getRow( $utf8 = false  )
    {   
        $this->makeConnection();
        
        if( $utf8 ) $this->mysqli->query("SET NAMES utf8");
        
        if ($result = $this->mysqli->query($this->myqry)) {
        
            $obj = $result->fetch_object();
            $result->close();
        } 
        
        if( !empty( $this->mysqli->error ) )
            echo $this->mysqli->error;
                     
        $this->mysqli->close();
        
        return $obj;
    }
    
    
    public function runQuery( $utf8 = false )
    {   
        
        $this->makeConnection();
        
        if( $utf8 ) $this->mysqli->query("SET NAMES utf8");
        
        $this->mysqli->query($this->myqry); 
        
        if( !empty( $this->mysqli->error ) )
            echo $this->mysqli->error;
        
        $affected_row = $this->mysqli->affected_rows;
                                     
        $this->mysqli->close();
        
        return $affected_row;
    }
        
}

?>
