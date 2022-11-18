<?php
require 'Model/NewsLetterModel.php';

class NewsLetterController {
    
    function InsertNewsLetters()
    {
        $title = $_POST["title"];
        $subject = $_POST["subject"];
        $news = $_POST["news"];
        
        $news = new NewsLetterEntity(-1,$title,$subject,$news);
        $newsLetterModel = new NewsLetterModel();
        $newsLetterModel->InsertNewsLetters($news);
    }
}
