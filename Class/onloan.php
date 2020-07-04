<?php

class onloan {
    
    protected $filmid;
    protected $duedate;
    protected $loandate;
    protected $username;
    
    function getFilmId() {
        return $this->filmid;
    }

    function getDuedate() {
        return $this->duedate;
    }

    function getLoandate() {
        return $this->loandate;
    }

    function getUsername() {
        return $this->username;
    }

    function setFilmtitle($filmtitle) {
        $this->filmtitle = $filmtitle;
    }

    function setDuedate($duedate) {
        $this->duedate = $duedate;
    }

    function setLoandate($loandate) {
        $this->loandate = $loandate;
    }

    function setUsername($username) {
        $this->username = $username;
    }

      public function __construct($filmid, $duedate, $loandate, $username) {
      $this->filmid = $filmid;
      $this->duedate = $duedate;
      $this->loandate = $loandate;
      $this->username = $username;      
    }
         
}

