<?php
class NewsLetterEntity {
    
    public $id;
    public $title;
    public $subject;
    public $news;    
    function __construct($id, $title, $subject, $news) {
        $this->id = $id;
        $this->title = $title;
        $this->subject = $subject;
        $this->news = $news;
    }
}
