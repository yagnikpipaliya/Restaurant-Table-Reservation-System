<?php
class ContactEntity {
    
    public $id;
    public $fullname;
    public $phoneno;
    public $email;
    public $approval;
    function __construct($id, $fullname, $phoneno, $email, $approval) {
        $this->id = $id;
        $this->fullname = $fullname;
        $this->phoneno = $phoneno;
        $this->email = $email;
        $this->approval = $approval;
    }

}
