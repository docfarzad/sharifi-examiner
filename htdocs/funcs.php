<?php


function fact_ret($tblsel_gtby, $col_gtby, $col_val_gtby, $key_gtby)
{
    
include "config.php";
    
    $sql_gtby="SELECT * FROM $tblsel_gtby WHERE $col_gtby ='$col_val_gtby'";
    $fact_gtby = NULL;
   
    if ($result_gtby=mysqli_query($con,$sql_gtby))
    {

        while($row_gtby = mysqli_fetch_array($result_gtby))
        {
            $fact_gtby = $row_gtby[$key_gtby];
        }
        

      
    }
    
mysqli_close($con);
return $fact_gtby;
    
}


?>