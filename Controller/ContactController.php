<?php
require_once 'Model\ContactModel.php'; 

class ContactController {
    
    function InsertContact()
    {
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $mail = $_POST["mail"];
        $approval = "Not Allowed";
        
        $contact = new ContactEntity(-1,$name,$phone,$mail,$approval);
        $contactModel = new ContactModel();
        $contactModel->InsertContact($contact);
    }
}
