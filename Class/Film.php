<?php


class Film {

    protected $filmtitle;
    protected $filmlength;
    protected $filmrating;
    protected$filmyear;
    protected $filmavailability;
    protected $filmloancount;
    protected $filmdirector;
    protected $filmgenre;
    protected $filmtown;
 
    function getFilmtitle() {
        return $this->filmtitle;
    }

    function getFilmlength() {
        return $this->filmlength;
    }

    function getFilmrating() {
        return $this->filmrating;
    }

    function getFilmyear() {
        return $this->filmyear;
    }

    function getFilmavailability() {
        return $this->filmavailability;
    }

    function getFilmloancount() {
        return $this->filmloancount;
    }

    function getFilmdirector() {
        return $this->filmdirector;
    }

    function getFilmgenre() {
        return $this->filmgenre;
    }

    function getFilmtown() {
        return $this->filmtown;
    }

    function setFilmtitle($filmtitle) {
        $this->filmtitle = $filmtitle;
    }

    function setFilmlength($filmlength) {
        $this->filmlength = $filmlength;
    }

    function setFilmrating ($filmrating) {
        if ($this-> is_valid_rating($filmrating) === TRUE) {
            $this->filmrating = $filmrating;
        }
    }

    function setFilmyear($filmyear) {
        $this->filmyear = $filmyear;
    }

    function setFilmavailability($filmavailability) {
        $this->filmavailability = $filmavailability;
    }

    function setFilmloancount($filmloancount) {
        $this->filmloancount = $filmloancount;
    }

    function setFilmdirector($filmdirector) {
        $this->filmdirector = $filmdirector;
    }

    function setFilmgenre($filmgenre) {
        if ($this->is_valid_genre($filmgenre)===TRUE){
        $this->filmgenre = $filmgenre;
        }
    }

    function setFilmtown($filmtown) {
        $this->filmtown = $filmtown;
    }

    function __construct($filmtitle, $filmlength, $filmyear, $filmavailability, $filmloancount, $filmdirector, $filmtown) {
        $this->filmtitle = $filmtitle;
        $this->filmlength = $filmlength;
        $this->filmrating = "";
        $this->filmyear = $filmyear;
        $this->filmavailability = $filmavailability;
        $this->filmloancount = $filmloancount;
        $this->filmdirector = $filmdirector;
        $this->filmgenre = "";
        $this->filmtown = $filmtown;
    }
    
    private function is_valid_genre($filmgenre) {
        $UpperFilmGenre = ucfirst($filmgenre);
        $validGenre = array('Action', 'Animation', 'Biography', 'Comedy', 'Crime', 'Drama', 'Mystery', 'Romance', 'Sci-fi', 'Sport');
        $valid = TRUE;
            
    if (in_array($UpperFilmGenre, $validGenre)){
         return $valid;
        }
        else {
            echo "Not a valid genre";
        }
    }
    
    private function is_valid_rating($filmrating) {
        $Agerating = $filmrating;
        $validRating = array(12, 13, 15, 16, 18, 'PG', 'U');
        $valid = TRUE;
        
        if (in_array($Agerating, $validRating)) {
            return $valid;
        } else {
            echo "Not a valid age rating.";
        }
    }
    
    function borrowedfilm() {
        echo '..' . '...' . $this->filmtitle;
    }
    
    function borrowedmem() {
        return $this-> filmtitle;
    }
  
}