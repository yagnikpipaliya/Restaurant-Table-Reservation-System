<?php
require 'Entity/ContactEntity.php';

class ContactModel {
    
    function InsertContact(ContactEntity $contact)
    {
        require 'credentials.php';
        $con=mysqli_connect($host,$user,$password,$database);
        if($con){
           /* echo "Success";*/
        }else{
            die(mysqli_error($con));
        }
        $query = sprintf("INSERT INTO `contact`(fullname, phoneno, email,approval)VALUES('%s','%s','%s','%s')",
                mysqli_real_escape_string($con, $contact->fullname),
                mysqli_real_escape_string($con,$contact->phoneno),
                mysqli_real_escape_string($con,$contact->email),
                mysqli_real_escape_string($con,$contact->approval));
        $result = mysqli_query( $con,$query) or trigger_error(mysqli_error($con));
        if($result)
        {
            echo "<script type='text/javascript'> alert('Newsletter subscription request sent')</script>";
            mysqli_close($con);
            echo "Connection Close";
        }
        else
        {
            echo "<script type='text/javascript'> alert('Something might not right')</script>";
        }
    }
}
