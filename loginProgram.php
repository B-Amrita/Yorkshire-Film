<?php
session_start();

include 'connection.php';

//if a session already exists if not a session is created 

//$uid = isset($_POST['uid']) ? $_POST['uid'] : $_SESSION['uid'];
//$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : $_SESSION['pwd'];


//checking if the password and email match and are in the database
//checks if the password matches the hashed password on the database

$loginMsg = '';

if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    $email = strip_tags(mysqli_real_escape_string($conn, trim($email)));
    $password = strip_tags(mysqli_real_escape_string($conn, trim($password)));
    $loginMsg ='';
    $message ='';
    
    $query= ("SELECT * FROM Users WHERE user_EMAIL = '".$email."'");
    $tbl = mysqli_query($conn, $query);
    if (mysqli_num_rows($tbl) > 0) {
        $row = mysqli_fetch_array($tbl);
        $password_hash = $row['user_PWD'];
        $usertype = $row['user_TYPE'];
        $userid = $row['user_ID'];
       // $useremail= $row['user_EMAIL'];
  
        
        if (password_verify($password, $password_hash) && $usertype === 'Member') {
            
              $_SESSION['User'] = $userid;
              header('Location: MembersAccount.php?user_ID='.$userid);
              
          }
           
            //create a session that will store the user_ID
        
        elseif (password_verify($password, $password_hash) && $usertype === 'Librarian') {
            header('Location: LibrarianAccount.php?user_ID='.$userid);
            
        } elseif (password_verify($password, $password_hash) && $usertype === 'Admin') {
           // header('Location: adminaccountpage.php?user_ID='.$userid);
              header('Location: adminaccountpage.php?user_ID='.$userid);
        }
        
        
        if (!password_verify($password, $password_hash)) {
            $loginMsg = "<p style='text-align:center; color: red;'>Wrong email/password, please try again</p>";
        }
        
        }
        
        
    }
    

/*const DB_DSN = 'mysql:host=localhost;dbname=Yorkshire-Films';
const DB_USER = 'root';
const DB_PASS = '';

try {
    $pdo = new PDO(DB_DSN, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die($e->getMessage());
}
*/


//$login_pwd= $pdo->prepare("SELECT user_PWD FROM Users WHERE user_EMAIL = 'email'");

/* if(isset($_POST['login'])){



  $email = (filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS));
  $password = trim((filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS)));

  if(password_verify($password, $hashed_password)) {
  // If the password inputs matched the hashed password in the database
  echo "";
  } else{
  echo "incorrect password";
  }
  //$userType ='';

  $login = $pdo->prepare("SELECT user_TYPE FROM Users WHERE user_EMAIL = :email");

  $login->bindParam("email", $email,PDO::PARAM_STR) ;



  $user = $login->fetch(PDO::FETCH_ASSOC);} */

/*$loginMsg = '';

global $loginMsg;

if ($user === false) {
    $loginMsg = '<div class="alert alert-danger alert-dismissible fade show" id="login-error">
                <strong>Error!  Try again </strong>
               <button type="button" class="close" data-dismiss="alert">&times;</button></div>';
    return $loginMsg;
} elseif ($user === true) {
    die('successs');
} elseif ($user === true && $user['user_TYPE'] === 'Member') {

    'Location: MembersAccount.php';
} elseif ($user === true && $user['user_TYPE'] === 'Librarian') {

    'Location: LibrarianAccount.php';
} elseif ($user === true && $user['user_TYPE'] === 'Admin') {

    'Location: adminaccountpage.php';
}*/
?>