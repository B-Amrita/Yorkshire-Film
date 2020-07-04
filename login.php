<?php
include 'loginProgram.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Log in </title>
        <link rel=stylesheet href="login.css">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"  crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"  crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"  crossorigin="anonymous">
    </head>
    <body>
        <!--navbar (hamburger menu) *not working yet*-->
      <nav class = "nav main-nav">
        <div class="toggle container">
           <i class= "fa fa-bars" aria-hidden="true"></i>
         </div>
   
         <!--navbar (normal)-->
           <ul>
             <li><a href= "home.php">HOME</a></li>
             <li><a href= "Films.php">FILMS</a></li>
             <li><a href= "login.php">LOG IN</a></li>
             <li><a href= "MembersAccount.php">MY ACCOUNT</a></li>
           </ul>
         </nav>
   
         <!--javascript function that triggers the hamburger menu when min-width is 480px-->
         <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
         
         <script type="text/javascript">
         $(document).ready(function(){
           $('.toogle').click(function(){
             $('ul').toogleClass('active');
           });
         });
         </script>

         <!--PHP email validation-->
         <?php

         /*$emailErr = "";
         $email="";

         if (empty(filter_input_array(INPUT_POST,"email"))) {
            $emailErr = "Email is required";
         }
         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
             $emailErr = "Invalid email format";
         }   */
         
         /*$email = filter_input(INPUT_POST, ['email'])
                 if preg_match("[a-z0-9._%+-]+@[a-z]+.com", $subject)
        
         */
      
         ?>

         <!--Form for logging into the website-->
         
         <div class= "login-container">
             <div class ="welcome">
             <h1 class="sign-in">SIGN IN</h1>
             <p class="message">Welcome back to Yorkshire Films <br> Sign in to view the latest Yorkshire films! <br> </p>
         </div> 
         
          
        
             <form action= "" method="post" id=form1> 

         
                 <input type="text" id="email" class="shadow p-3 mb-5 bg-white rounded form" placeholder="Email" name="email" pattern="[a-z0-9._%+-]+@[a-z]+.com" autofocus required>
                 <span class="error"></span>
                 <input type= "password" id="password"  class="shadow p-3 mb-5 bg-white rounded form" placeholder="Password" name="password"  required> 
                   <div><?php echo $loginMsg; ?></div>
                   <p class="forgotten-pass"><a href="">Forgotten your password?</a></p>
                   

                 <button type="submit" id="submit" value="submit" form="form1" name='login' class="form">LOG IN</button>    
             </form>
         
              <div class="create-acc">
                  <button type="submit" value="register" class="register" id="create"> <a href="/Yorkshire-Films/UserReg.php" class="registeracc">CREATE ACCOUNT</a></button>
              </div>


         </div>

         <!--footer-->
         <footer>
            <div class="info-container">
              <p class="info"><a href="">HELP</a></p>
              <p class="info"><a href="">PRIVACY POLICY</a></p>
              <p class= "info"><a href="Jobs.php">JOBS</a></p>
            </div>

            <div class="social-container">
                <span class="icon" src="" href=""></span>
              <span class="icon" src="" href="" ></span>
              <span class="icon" src="" href="" ></span>
            </div>
          </footer>
    </body>
</html>
