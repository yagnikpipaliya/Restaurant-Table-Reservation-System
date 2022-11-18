<?php
require 'Model/LoginModel.php';

class LoginController {
    
    function InsertUsers()
    {
        $newus = $_POST["newus"];
        $newps = $_POST["newps"];
        
        $usrs = new LoginEntity(-1,$newus,$newps);
        $loginModel = new LoginModel();
        $loginModel->InsertUsers($usrs);
    }
    function UpdateUsers($id)
    {
        $usname = $_POST["uname"];
        $passwr = $_POST["pass"];
        
        $usrs = new LoginEntity($id,$usname,$passwr);
        $loginModel = new LoginModel();
        $loginModel->UpdateUsers($id, $usrs);
    }
}
