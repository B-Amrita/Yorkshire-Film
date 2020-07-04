<?php


class Member extends Users{

    public function Welcome() {
        echo "Hello, " . $this->userfirstname . "! Welcome to Yorkshire Films" .PHP_EOL;
    }
    
    function borrowedmem() {
        echo $this->userfirstname . ", " . "you have borrowed ";
    }
    
    function dueDate() {
        echo "Your due date is ";
    }
}
