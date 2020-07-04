<!----------------------DATABASE CONNECTION & FORM SUBMIT --------->
<?php

//include 'Autoloader.php';

const DB_DSN = 'mysql:host=localhost;dbname=Yorkshire-Films';
const DB_USER = 'root';
const DB_PASS = '';

try {
    $pdo = new PDO(DB_DSN, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die($e->getMessage());
}

/* * *************POPULATE MEMBER & LIBRARIAN & FILM & ONLOAN TABLES********* */
$fmtable = $pdo->query("SELECT Films.fm_ID, Films.fm_TITLE, Films.fm_LENGTH, Films.fm_RATING, Films.fm_YEAR, Directors.dir_NAME, Genres.genre, Towns.twn_NAME, Films.fm_AVAILABILITY, Films.FM_LOANCOUNT, Films.fm_SYNOPSIS  FROM `Films` 
                            INNER JOIN Genres on Films.fm_GENRE = Genres.gn_ID
                            INNER JOIN Directors on Films.fm_DIR = Directors.dir_ID
                            INNER JOIN Towns on Films.fm_TOWN = Towns.twn_ID
                            Order by Films.fm_ID;");

$memtable = $pdo->query("SELECT * FROM Users WHERE user_TYPE in ('Member')");

$libtable = $pdo->query("SELECT * FROM Users WHERE user_TYPE in ('Librarian')");

$loantable = $pdo->query("SELECT Onloan.onloan_ID, Films.fm_TITLE, Onloan.due_DATE,Onloan.loan_DATE, Users.user_UN FROM `Onloan` 
                            INNER JOIN Films on Onloan.fm_ID  = Films.fm_ID
                            INNER JOIN Users on Onloan.user_ID = Users.user_ID;
                            ");



/* * *************ADD MEMBER FORM********* */

$memMsg = '';

global $memMsg;
if (isset($_POST["memSubmit"])) {
    $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_SPECIAL_CHARS);
    $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_SPECIAL_CHARS);
    $userName = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
    $dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_SPECIAL_CHARS);
    $telNo = filter_input(INPUT_POST, 'telNo', FILTER_SANITIZE_SPECIAL_CHARS);
    $userType = 'Member';


    $new_mem = $pdo->prepare("INSERT INTO Users ( user_UN,  user_FN, user_SN, user_EMAIL, user_DOB, user_TEL, user_TYPE)
              VALUES (  :username, :userfn, :userln, :email, :dob, :tel, :type)");

    $new_mem->execute([
        'username' => $userName,
        'userfn' => $firstName,
        'userln' => $lastName,
        'email' => $email,
        'dob' => $dob,
        'tel' => $telNo,
        'type' => $userType,
    ]);

    $memMsg = '<div class="alert alert-success alert-dismissible fade show">
                <strong> <i class="icon fa fa-check"></i> Success!         <a href= "javascript:history.go(-2);" >View Results</a></strong>
             <button type="button" class="close" data-dismiss="alert">&times;</button></div>';
    return $memMsg;
}

/* * *************ADD LIBRARIAN FORM********* */

$libMsg = '';

global $libMsg;
if (isset($_POST["libSubmit"])) {
    $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_SPECIAL_CHARS);
    $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_SPECIAL_CHARS);
    $userName = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
    $dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_SPECIAL_CHARS);
    $telNo = filter_input(INPUT_POST, 'telNo', FILTER_SANITIZE_SPECIAL_CHARS);
    $userType = 'Librarian';


    $new_lib = $pdo->prepare("INSERT INTO Users ( user_UN,  user_FN, user_SN, user_EMAIL, user_DOB, user_TEL, user_TYPE)
              VALUES (  :username, :userfn, :userln, :email, :dob, :tel, :type)");

    $new_lib->execute([
        'username' => $userName,
        'userfn' => $firstName,
        'userln' => $lastName,
        'email' => $email,
        'dob' => $dob,
        'tel' => $telNo,
        'type' => $userType,
    ]);

    $libMsg = '<div class="alert alert-success alert-dismissible fade show">
                <strong> <i class="icon fa fa-check"></i> Success!         <a href="javascript:history.go(-2);" >View Results</a></strong>
             <button type="button" class="close" data-dismiss="alert">&times;</button></div>';
    return $libMsg;
}

/* * ************* ADD FILM FORM********* */

$fmMsg = '';



global $fmMsg;
if (isset($_POST["fmSubmit"]) && !is_numeric($_POST['filmLength'])) {
    $fmMsg = '<div class="alert alert-danger alert-dismissible fade show">
                <strong>Error! Film length must be entered as number of minutes, i.e. 95 </strong>
               <button type="button" class="close" data-dismiss="alert">&times;</button></div>';
    return $fmMsg;
} elseif (isset($_POST["fmSubmit"]) && !is_numeric($_POST['filmYear'])) {
    $fmMsg = '<div class="alert alert-danger alert-dismissible fade show">
                <strong>Error! Film year must be in number format, i.e. 2009  </strong>
             <button type="button" class="close" data-dismiss="alert">&times;</button></div>';
    return $fmMsg;
} elseif (isset($_POST["fmSubmit"])) {
    $filmID = filter_input(INPUT_POST, 'filmID', FILTER_SANITIZE_SPECIAL_CHARS);
    $filmLength = filter_input(INPUT_POST, 'filmLength', FILTER_SANITIZE_SPECIAL_CHARS);
    $filmName = filter_input(INPUT_POST, 'filmName', FILTER_SANITIZE_SPECIAL_CHARS);
    $filmYear = filter_input(INPUT_POST, 'filmYear', FILTER_SANITIZE_SPECIAL_CHARS);
    $filmRating = filter_input(INPUT_POST, 'filmRating', FILTER_SANITIZE_SPECIAL_CHARS);
    $filmDirector = filter_input(INPUT_POST, 'filmDirector', FILTER_SANITIZE_SPECIAL_CHARS);
    $filmGenre = filter_input(INPUT_POST, 'filmGenre', FILTER_SANITIZE_SPECIAL_CHARS);
    $filmTown = filter_input(INPUT_POST, 'filmTown', FILTER_SANITIZE_SPECIAL_CHARS);
    $filmAvailability = filter_input(INPUT_POST, 'filmAvailability', FILTER_SANITIZE_SPECIAL_CHARS);
    $filmSynopsis = filter_input(INPUT_POST, 'filmSynopsis', FILTER_SANITIZE_SPECIAL_CHARS);
    $filmLoanCount = 0;


    $new_fm = $pdo->prepare("INSERT INTO Films (fm_ID, fm_TITLE, fm_LENGTH, fm_RATING, fm_YEAR, fm_DIR, fm_GENRE, fm_TOWN, fm_AVAILABILITY, fm_LOANCOUNT, fm_SYNOPSIS)
              VALUES ( :id, :name, :length, :rating, :year, :director, :genre, :town, :availability, :loancount, :synopsis)");

    $new_fm->execute([
        'id' => $filmID,
        'name' => $filmName,
        'length' => $filmLength,
        'rating' => $filmRating,
        'year' => $filmYear,
        'director' => $filmDirector,
        'genre' => $filmGenre,
        'town' => $filmTown,
        'availability' => $filmAvailability,
        'loancount' => $filmLoanCount,
        'synopsis' => $filmSynopsis
    ]);

    $fmMsg = '<div class="alert alert-success alert-dismissible fade show">
                <strong> <i class="icon fa fa-check"></i> Success!         <a href="javascript:history.go(-2)">View Results</a></strong>
             <button type="button" class="close" data-dismiss="alert">&times;</button></div>';
    return $fmMsg;
} elseif (isset($_POST["fmSubmit"])) {
    $fmMsg = '<div class="alert alert-danger alert-dismissible fade show">
                <strong>Error!   </strong>
             <button type="button" class="close" data-dismiss="alert">&times;</button></div>';
    return $fmMsg;
}


/* * *************ADD LOAN FORM********* */
$loanMsg = '';
global $loanMsg;

global $loanMsg;
if (isset($_POST["loanSubmit"])) {
    $filmName = filter_input(INPUT_POST, 'filmName', FILTER_SANITIZE_SPECIAL_CHARS);
    $dueDate = filter_input(INPUT_POST, 'dueDate', FILTER_SANITIZE_SPECIAL_CHARS);
    $loanDate = filter_input(INPUT_POST, 'loanDate', FILTER_SANITIZE_SPECIAL_CHARS);
    $username = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_SPECIAL_CHARS);

    $getFilmID = $pdo->prepare("SELECT fm_ID FROM Films WHERE fm_title = :filmName");
    $getFilmID->execute([
        'filmName' => $filmName,
    ]);
    $fm_ID = $getFilmID->fetchAll();
    $newfm_ID = $fm_ID['0']['fm_ID'];


    $getUserID = $pdo->prepare("SELECT user_ID FROM Users WHERE user_UN = :username;");
    $getUserID->execute([
        'username' => $username,
    ]);
    $user_ID = $getUserID->fetchAll();
    $newuser_ID = $user_ID['0']['user_ID'];

    $new_loan = $pdo->prepare("INSERT INTO Onloan ( fm_ID, loan_DATE, due_DATE, user_ID)
              VALUES (  :fmID, :loandate, :duedate, :userID)");

    $new_loan->execute([
        'fmID' => $newfm_ID,
        'loandate' => $dueDate,
        'duedate' => $loanDate,
        'userID' => $newuser_ID,
    ]);

    $loanMsg = '<div class="alert alert-success alert-dismissible fade show">
                <strong> <i class="icon fa fa-check"></i> Success!         <a href="javascript:history.go(-2)" >View Results</a></strong>
             <button type="button" class="close" data-dismiss="alert">&times;</button></div>';
    return $loanMsg;
}



/* * ************* UPDATE MEMBER FORM********* */
global $memUpdateMsg;


if (isset($_GET['user_ID'])) {
    if (!empty($_POST['updateMem'])) {

        $userid = $_GET['user_ID'];
        $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
        $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
        $userName = isset($_POST['userName']) ? $_POST['userName'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $dob = isset($_POST['dob']) ? $_POST['dob'] : '';
        $telNo = isset($_POST['telNo']) ? $_POST['telNo'] : '';
        $userType = 'Member';


        $stmt = $pdo->prepare('UPDATE Users SET user_ID = ?, user_FN =? , user_SN =? , user_UN =? ,user_EMAIL =? , user_DOB =? , user_TEL =?, user_TYPE =?    WHERE user_ID = ? ');
        $stmt->execute(([$userid, $firstName, $lastName, $userName, $email, $dob, $telNo, $userType, $_GET['user_ID']]));


        $memUpdateMsg = '<div class="alert alert-success alert-dismissible fade show">
                <strong> <i class="icon fa fa-check"></i> Updated!         <a href="javascript:history.go(-2)">View Results</a></strong>
             <button type="button" class="close" data-dismiss="alert">&times;</button></div>';
        return $memUpdateMsg;
    }
}

/* * ************* UPDATE FILM FORM********* */
global $filmUpdateMsg;


if (isset($_GET['fm_ID'])) {


    if (isset($_POST['updateFilm']) && !is_numeric($_POST['filmLength'])) {
        $filmUpdateMsg = '<div class="alert alert-danger alert-dismissible fade show">
                <strong>Error! Film length must be entered as number of minutes, i.e. 95 </strong>
               <button type="button" class="close" data-dismiss="alert">&times;</button></div>';
        return $filmUpdateMsg;
    } elseif (isset($_POST['updateFilm']) && !is_numeric($_POST['filmYear'])) {
        $filmUpdateMsg = '<div class="alert alert-danger alert-dismissible fade show">
                <strong>Error! Film year must be in number format, i.e. 2009  </strong>
             <button type="button" class="close" data-dismiss="alert">&times;</button></div>';
        return $filmUpdateMsg;
    } elseif (!empty($_POST['updateFilm'])) {


        $GetfilmID = $_GET['fm_ID'];
        // $filmID =filter_input(INPUT_POST, 'filmID', FILTER_SANITIZE_SPECIAL_CHARS); 
        $filmName = filter_input(INPUT_POST, 'filmName', FILTER_SANITIZE_SPECIAL_CHARS);
        $filmLength = isset($_POST['filmLength']) ? $_POST['filmLength'] : '';
        $filmYear = isset($_POST['filmYear']) ? $_POST['filmYear'] : '';
        $filmGenre = isset($_POST['filmGenre']) ? $_POST['filmGenre'] : '';
        $filmRating = isset($_POST['filmRating']) ? $_POST['filmRating'] : '';
        $filmDirector = isset($_POST['filmDirector']) ? $_POST['filmDirector'] : '';
        $filmTown = isset($_POST['filmTown']) ? $_POST['filmTown'] : '';
        $filmAvailability = isset($_POST['filmAvailability']) ? $_POST['filmAvailability'] : '';
        $filmSynopsis = isset($_POST['filmSynopsis']) ? $_POST['filmSynopsis'] : '';
        $filmLoanCount = 0;




        $stmt = $pdo->prepare('UPDATE Films SET '
                //.'fm_ID =? , '
                . 'fm_TITLE =? , '
                . 'fm_LENGTH =? , '
                . 'fm_RATING =? ,'
                . 'fm_YEAR =? , '
                . 'fm_DIR =? , '
                . 'fm_GENRE =?, '
                . 'fm_TOWN =? , '
                . 'fm_AVAILABILITY=?, '
                . 'fm_LOANCOUNT=? , '
                . 'fm_SYNOPSIS =?  '
                . 'WHERE fm_ID = ? ;');

        // $stmt->execute(([$filmID,  $filmName, $filmLength,  $filmYear,$filmGenre,  $filmRating, $filmDirector ,$filmTown,$filmAvailability,$filmLoanCount,$filmSynopsis, $GetfilmID]));

        $stmt->execute([
            'fm_ID' => $GetfilmID,
            'fm_TITLE' => $filmName,
            'fm_LENGTH' => $filmLength,
            'fm_YEAR' => $filmYear,
            'fm_GENRE' => $filmGenre,
            'fm_RATING' => $filmRating,
            'fm_DIR' => $filmDirector,
            'fm_TOWN' => $filmTown,
            'fm_AVAILABILITY' => $filmAvailability,
            'fm_LOANCOUNT' => $filmLoanCount,
            'fm_SYNOPSIS' => $filmSynopsis,
        ]);

        $filmUpdateMsg = '<div class="alert alert-success alert-dismissible fade show">
                <strong> <i class="icon fa fa-check"></i> Updated!         <a href="javascript:history.go(-2)">View Results</a></strong>
             <button type="button" class="close" data-dismiss="alert">&times;</button></div>';
        return $filmUpdateMsg;
    }
}
        
 /* * ************* UPDATE LOAN FORM********* */
global $loanUpdateMsg;


if (isset($_GET['onloan_ID'])) {
    if (!empty($_POST['loanUpdate'])) {

        $loanid = $_GET['onloan_ID'];
        $filmName = isset($_POST['filmName']) ? $_POST['filmName'] : '';
        $dueDate = isset($_POST['dueDate']) ? $_POST['dueDate'] : '';
        $loanDate = isset($_POST['loanDate']) ? $_POST['loanDate'] : '';
        
        


        $stmt = $pdo->prepare('UPDATE Onloan SET user_ID = ?, user_FN =? , user_SN =? , user_UN =? ,user_EMAIL =? , user_DOB =? , user_TEL =?, user_TYPE =?    WHERE user_ID = ? ');
        $stmt->execute(([$userid, $firstName, $lastName, $userName, $email, $dob, $telNo, $userType, $_GET['user_ID']]));


        $loanUpdateMsg = '<div class="alert alert-success alert-dismissible fade show">
                <strong> <i class="icon fa fa-check"></i> Updated!         <a href="javascript:history.go(-2)">View Results</a></strong>
             <button type="button" class="close" data-dismiss="alert">&times;</button></div>';
        return $loanUpdateMsg;
    }
}      

   
 
         

        
        

    

       
