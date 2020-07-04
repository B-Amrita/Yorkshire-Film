<?php

abstract class Users {
    protected $username;
    protected $password;
    protected $userfirstname;
    protected $usersurname;
    protected $email;
    protected $dob;
    protected $tel;
    
    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getUserfirstname() {
        return $this->userfirstname;
    }

    function getUsersurname() {
        return $this->usersurname;
    }

    function getEmail() {
        return $this->email;
    }

    function getDob() {
        return $this->dob;
    }

    function getTel() {
        return $this->tel;
    }
    function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        if ($this->is_valid_password($password) === TRUE) {
            $this->password = $password;
        }
    }

    function setUserfirstname($userfirstname) {
        $this->userfirstname = $userfirstname;
    }

    function setUsersurname($usersurname) {
        $this->usersurname = $usersurname;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setDob($dob) {
        $this->dob = $dob;
    }

    function setTel($tel) {
        $this->tel = $tel;
    }

    public function __construct($username, $userfirstname, $usersurname, $email, $dob, $tel) {
      $this->username = $username;
      $this->password = "";
      $this->userfirstname = $userfirstname;
      $this->usersurname = $usersurname;
      $this->email = $email;
      $this->dob = $dob;
      $this->tel = $tel;
      
    }
    

    private function is_valid_password($password) {
        $valid = TRUE;
        $number = preg_match('/\d/', $password);
        if (strlen($password) < 6 || strlen($password) > 12) {
            $valid = FALSE;
            echo "Password must be between 6 and 12 characters." . PHP_EOL;
        };
        if (!$number) {
            $valid = FALSE;
            echo "Password must contain at least one number." . PHP_EOL;
        }
        return $valid;
    }

    protected function Welcome(){
        echo "..." . $this->userfirstname. "..." .PHP_EOL;
    }
    
    function borrowedmem() {
        echo $this->userfirstname . " " . "you have borrowed";
    }
    
    function borrowedfilm() {
        return $this->userfirstname;
    }
}
