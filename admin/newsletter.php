<?php
require 'credentials.php';

$eid = $_GET["eid"];
$approval ="Allowed";
$napproval="Not Allowed";

$con=mysqli_connect($host,$user,$password,$database);
if($con){
    /*echo "Success";*/
}else{
    die(mysqli_error($con));
}


$query = "SELECT * FROM contact where id = '$eid'";
$res = mysqli_query($con,$query);

while ($row = mysqli_fetch_array($res))
{
    $id =$row["approval"];
}

if($id == "Not Allowed")
{
    $queryupd = "UPDATE contact SET `approval`= '$approval' WHERE id = '$eid'";
    if(mysqli_query($con,$queryupd))
    {
        echo '<script>alert("Subscriber status changed to Allowed") </script>' ;
        //header('Location: messages.php');
        echo '<meta http-equiv="refresh" content="1; URL=messages.php" />';
    }
}
else
{
    $queryup ="UPDATE contact SET `approval`= '$napproval' WHERE id = '$eid' ";
    if(mysqli_query($con,$queryup))
    {
        echo '<script>alert("Subscriber status changed to Not Allowed") </script>' ;
	//header('Location: messages.php');
        echo '<meta http-equiv="refresh" content="1; URL=messages.php" />';
    }
}
?>