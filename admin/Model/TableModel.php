<?php
require 'Entity/TableEntity.php';

class TableModel {
    
    function InsertTableRecord(TableEntity $table)
    {
        require 'credentials.php';
        $con=mysqli_connect($host,$user,$password,$database);
        if($con){
            echo "Success";
        }else{
            die(mysqli_error($con));
        }
        $query = sprintf("INSERT INTO tablebook(Title,FName,LName,Email,National,Country,Phone,Tbltyp,Purpose,Meal,time,date,status)VALUES('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
                mysqli_real_escape_string($con,$table->Title),
                mysqli_real_escape_string($con,$table->FName),
                mysqli_real_escape_string($con,$table->LName),
                mysqli_real_escape_string($con,$table->Email),
                mysqli_real_escape_string($con,$table->National),
                mysqli_real_escape_string($con,$table->Country),
                mysqli_real_escape_string($con,$table->Phone),
                mysqli_real_escape_string($con,$table->Tbltyp),
                mysqli_real_escape_string($con,$table->Purpose),
                mysqli_real_escape_string($con,$table->Meal),
                mysqli_real_escape_string($con,$table->time),
                mysqli_real_escape_string($con,$table->date),
                mysqli_real_escape_string($con,$table->status));
        if(mysqli_query($con,$query))
        {
            echo "<script type='text/javascript'> alert('Your Booking application has been sent')</script>";
            $con->close();
        }
        else
        {
            echo "<script type='text/javascript'> alert('Error adding user in database')</script>";
        }
    }
}
