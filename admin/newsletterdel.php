<?php
require 'credentials.php';
ob_start();
 $con=mysqli_connect($host,$user,$password,$database);
if($con){
    /*echo "Success";*/
}else{
    die(mysqli_error($con));
}
$id = $_GET["eid"];
if($id == "")
{
    echo '<script>alert("Something might be wrong") </script>' ;
    //header('Location: messages.php');
    echo '<meta http-equiv="refresh" content="1; URL=messages.php" />';
}
else
{
    $querydel="DELETE FROM `contact` WHERE id ='$id' ";
    if(mysqli_query($con,$querydel))
    {
	echo '<script>alert("Subscriber Remove") </script>' ;
        //header('Location: messages.php');
        echo '<meta http-equiv="refresh" content="1; URL=messages.php" />';
    }
}
ob_end_flush();
?>

