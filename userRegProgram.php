<?php

$firstName = "";
$lastName = "";
$dob = "";
$email = "";
$telNo = "";
$userName = "";
$password = "";
$loginMsg='';
  global $loginMsg;  
        
        if (isset($_POST['submit']) && empty($errors)) { //only inserts below into DB if submit button is pressed and errors array is empty
        
        $member1 = new Member (
                $userName = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS),
                $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING),
                $hashed_password = password_hash($password, PASSWORD_BCRYPT),
                $firstName = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS),
                $lastName = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_SPECIAL_CHARS),
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS),
                $dob = filter_input(INPUT_POST, 'DOB', FILTER_SANITIZE_SPECIAL_CHARS),      
                $telNo = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_SPECIAL_CHARS),
                $userType = filter_input(INPUT_POST, 'lib_code', FILTER_SANITIZE_SPECIAL_CHARS) );
                    if (empty($userType)){
                    ($userType = "Member");
                    }
        $new_mem = $pdo->prepare("INSERT INTO Users ( user_UN,  user_FN, user_SN, user_EMAIL, user_DOB, user_TEL, user_TYPE, user_PWD)
              VALUES (  :username, :userfn, :userln, :email, :dob, :tel, :type, :password)");

        $new_mem->execute([
            'username' => $userName,
            'password' => $hashed_password,
            'userfn' =>  $firstName,
            'userln' => $lastName,
            'email' => $email,
            'dob' =>  $dob,
            'tel' => $telNo,
            'type' => $userType,
                ]);

        $loginMsg = '<div class="alert alert-success alert-dismissible fade show">
                <strong> <i class="icon fa fa-check"></i> You have successfully registered! Please <a href="/Yorkshire-Films/login.php" >login.</a></strong>
             <button type="button" class="close" data-dismiss="alert">&times;</button></div>';
        return $loginMsg;
    }
