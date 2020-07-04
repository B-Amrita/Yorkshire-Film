<?php

class Librarian extends Users{

    public function Welcome() {
        echo "Hello, " . $this->userfirstname . "! Welcome to Yorkshire Films" .PHP_EOL;
    }

}
