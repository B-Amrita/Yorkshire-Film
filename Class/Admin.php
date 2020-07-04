<?php


class Admin extends Users{

    public function Welcome() {
        echo "Welcome " . $this->userfirstname.  " You are an Admin and you can access admin.html" .PHP_EOL;
    }  
     
}
