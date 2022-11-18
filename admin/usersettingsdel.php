<?php

require 'credentials.php';
        
        $con=mysqli_connect($host,$user,$password,$database);
        if($con){
            /*echo "Success";*/
        }else{
            die(mysqli_error($con));
        }
        
        $id = $_GET["eid"];
        $query = sprintf("DELETE FROM login WHERE id = $id");
        if(mysqli_query($con,$query))
        {
            echo' <script language="javascript" type="text/javascript"> alert("Deleted") </script>';
            $con->close();
        }
        echo '<meta http-equiv="refresh" content="1; URL=usersettings.php" />';
?>

