<?php
require 'Entity/NewsLetterEntity.php';

class NewsLetterModel {
    
    function InsertNewsLetters(NewsLetterEntity $news)
    {
        require 'credentials.php';
        
        $con=mysqli_connect($host,$user,$password,$database);
        if($con){
           /* echo "Success";*/
        }else{
            die(mysqli_error($con));
        }
        $query = sprintf("INSERT INTO newsletterlog(title,subject,news)VALUES('%s','%s','%s')",
                mysqli_real_escape_string($con,$news->title),
                mysqli_real_escape_string($con,$news->subject),
                mysqli_real_escape_string($con,$news->news));
        if(mysqli_query($con,$query))
        {
            echo "<script type='text/javascript'> alert('NewsLetter has been sent')</script>";
            $con->close();
        }
        else
        {
            echo "<script type='text/javascript'> alert('Something might not right')</script>";
        }
    }
}
