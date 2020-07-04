<?php        

include 'AutoLoader.php';
include 'PDO_connection.php';


 if (isset($_POST['submit'])) {
        $validation = new User_validation($_POST);
        $errors = $validation->validateForm();
 }    
 include 'userRegProgram.php';
 
 if (!empty($errors)) {
     echo "There was a problem submitting your form. See below for help.";
 }
 

?>


<!DOCTYPE html>
<html>
    <style>
 .button {
  background-color: grey;
  border: none;
  color: white;
  padding: 15px 100px;
  text-align: center;
  text-decoration: none;
  text-transform: uppercase;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
      text-align: center;
    background-color: black;
    border-radius: 7px;
    color: white;
    font-weight: bolder;
}       

.button:hover {
        color: white;
    background-color: rgb(240, 102, 102);
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.container-btn {
    margin-left: 45px;
}

.pure-control-group {
  width: 25%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
 }

div.sticky {
  position: -webkit-sticky; 
  position: sticky;
  top: 0;
  z-index: 2;
  }
  
 .flex-container {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-around;
    align-items: center;
    height: 150px;
    font-size: 1.8em;;
    font-family: 'Sen', sans-serif;
    background-image: url('Images/blackbackground.png');
    color: white;
  }
    body {
            font-family: Arial;
        }
        
        .instruc {
            text-align: center;
            text-transform: uppercase;
            padding-top:40px;
        }
        
        .new-user {
            margin-left: 50px;
        }
        
        .pure-control-group {
            width: 400px;
        }

.error {
   color: red;
   font-size: 16px
  }

    </style>
<head>
        <meta charset="UTF-8">
        <title>Registration page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
               
        <link rel=stylesheet href="account.css">
        <link rel=stylesheet href="home.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"  crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"  crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"  crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="dist/jquery.tabledit.js"></script>
        <script type="text/javascript" src="custom_table_edit.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body>
  <!--navbar (hamburger menu)-->
      <nav class = "nav main-nav">
     <div class="toggle">
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

    <!--Slogan-->
            <div class="flex-container">
                <div>YORKSHIRE FILMS </br> </div>
                <div>BROWSE</div>
                <div>BORROW</div>
                <div>ENJOY</div>
                <div>REPEAT</div>
            </div>
    
  <div class="headerLogo">
      <img src="Images/reel.png", width="100%" height="100px" background-size: cover />
    </div>    
        <body>
           <!-- <div class="sticky">
                <h1 style="font: 25px Georgia, serif; line-height: 1.8;background-color:grey;" ><center> YORKSHIRE FILMS</center></h1>
            </div>-->
    <p>    
    <h3 class="instruc">Enter your details below to start borrowing our films.  </h3>  
    </p><div><?php echo $loginMsg; ?></div>
<div class="new-user">
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
    <div class="pure-form pure-form-aligned" >
        <div class="pure-control-group">
            First Name:<input type="text" class="form-control" name='firstname' autofocus="" required=""> 
            <div class='error'>
                <?php echo $errors['firstname'] ?? '' ?>
            </div>
        </div>
    </div>
    <div class="pure-form pure-form-aligned">
        <div class="pure-control-group">
            Surname:<input type="text" class="form-control" name='surname' required="">
            <div class='error'>
                <?php echo $errors['surname'] ?? '' ?>
            </div>
        </div>
    </div>      
    <div class="pure-form pure-form-aligned">
        <div class="pure-control-group">
            Email:<input type="email" class="form-control" name='email' placeholder="weloveyorkshire@films.com" required="">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            <div class='error'>
                <?php echo $errors['email'] ?? '' ?>
            </div>
        </div>
    </div>
    <div class="pure-form pure-form-aligned">
        <div class="pure-control-group">
            Telephone:<input type="text" class="form-control" name='tel' required=""> 
            <div class='error'>
                <?php echo $errors['tel'] ?? '' ?>
            </div>
        </div>  
    </div>
  
    <div class="pure-form pure-form-aligned">
        <div class="pure-control-group">
            Date of Birth:<input type="date" class="form-control" name='DOB' required="">
            <div class='error'>
                <?php echo $errors['DOB'] ?? '' ?>
            </div>
        </div>
    </div>
   
    <div class="pure-form pure-form-aligned">
        <div class="pure-control-group" >
            Create a username:<input type="text" class="form-control" name='username' required="">
            <div class='error'>
                <?php echo $errors['username'] ?? '' ?>
            </div>
        </div>
    </div>
    <div class="pure-form pure-form-aligned">
        <div class="pure-control-group" >
            Choose a password:<input type="password" class="form-control" name='password' required="">
            <div class='error'>
                <?php echo $errors['password'] ?? '' ?>
            </div>
        </div>
    </div>
    <div class="pure-form pure-form-aligned">
        <div class="pure-control-group" >
            Confirm password:<input type="password" class="form-control" name='password_confirm' required="">
            <div class='error'>
                <?php echo $errors['password_confirm'] ?? '' ?>
            </div>
        </div>
    
    </div>
    <div>        
        <div class="pure-form pure-form-aligned">
            <div class="pure-control-group" >
            
            (Office only) Enter your Library code:<input type="text" class="form-control" name='lib_code' id="lib_code">
            <?php echo $errors['lib_code'] ?? '' ?>
            </div>
            
        </div>
    </div>    
        <div class="pure-form pure-form-aligned container-btn">
        <input type="submit" value="Register" name= "submit" class="button">
        </div>
        </form>

</div>    
   
  <footer>
              <div class="info-container">
                <p class="info"><a href="">HELP</a></p>
                <p class="info"><a href="">PRIVACY POLICY</a></p>
                <p class= "info"><a href="Jobs.php">JOBS</a></p>
              </div>
  </footer>
    </body>
</html>

