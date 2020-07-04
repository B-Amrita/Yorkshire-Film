<?php
include 'AutoLoader.php';
include 'AccountProgram.php';

?>

<!DOCTYPE html>
<!-----------------------HEAD------------------------>  
<html>
    <head>
        <title>Yorkshire films - Add a Member</title>
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
<!-----------------------BODY------------------------>  
    <body>
        <div class="container-sm">

<!------------------navbar (hamburger menu)-------------------------->
            <nav class = "nav main-nav">
                <div class="toggle">
                    <i class= "fa fa-bars" aria-hidden="true"></i>
                </div>

<!---------------navbar (normal)-->
                <ul>
                    <li><a href= "home.php">HOME</a></li>
                    <li><a href= "films.php">FILMS</a></li>
                    <li><a href= "login.php">LOG IN</a></li>
                </ul>
            </nav>

<!----------------jS function that triggers the hamburger menu when min-width is 480px-->
            <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

            <script type="text/javascript">
                $(document).ready(function () {
                    $('.toogle').click(function () {
                        $('ul').toogleClass('active');
                    });
                });
            </script>

<!-----------------------------------------------------------Slogan----------------------------------------------->
            <div class="flex-container">
                <div>BROWSE</div>
                <div>BORROW</div>
                <div>ENJOY</div>
                <div>REPEAT</div>
            </div>



<!-----------------------Add member form------------------------>  


<div class="add-form"> 
               
                
             <h2>Add a Member</h2>

                
                
                <div><?php echo $memMsg; ?></div>

                
                
                <form name="memForm" class="memForm" id="memForm" action = "" method = "POST">

                    
                <div class="form-group">
                <div class="row">
                <div class="col">
                First Name:<input  type="text" class="form-control" placeholder="First Name"  name="firstName" id="firstName" value="" required autofocus="true" />              
                </div> 
                <div class="col">
                Last Name:<input  type="text" class="form-control" placeholder="Last Name"  name="lastName" id="lastName" value="" required autofocus="true" />        
              </div>
                </div></div>
                <br/>
                
                
                
                <div class="form-group">
                <div class="row">
                <div class="col">
                User Name:<input  type="text" class="form-control" placeholder="Username"  name="userName" id="userName" value="" required autofocus="true" />          
                   </div> 
                <div class="col">
                Email:<input  type="text" class="form-control" placeholder="Email"  name="email" id="email" value="" required autofocus="true" />        
              </div>
                </div></div>
                <br/>
                
                
               <div class="form-group">
                <div class="row">
                <div class="col">
                Date of Birth:<input  type="text" class="form-control" placeholder="Date of Birth"  name="dob" id="dob" value="" required autofocus="true" />          
                   </div> 
                <div class="col">
                Telephone No.:<input  type="text" class="form-control" placeholder="Telephone No."  name="telNo" id="telNo" value="" required autofocus="true" />        
              </div>
                </div></div>
                <br/> 
               
                

                
              
           <input type="submit" value=" Add Member" name="memSubmit" id="submit-button" class="btn btn-primary" onclick="clearField()" />

                </form> 
                
                </div>
  <!-------------------------------FOOTER------------------------------------------>
            <footer>
              <div class="info-container">
                <p class="info"><a href="">HELP</a></p>
                <p class="info"><a href="">PRIVACY POLICY</a></p>
                <p class= "info"><a href="Jobs.php">JOBS</a></p>
              </div>

              <div class="social-container">
                <span class="icon" src="" href="" ></span>
                <span class="icon" src="" href="" ></span>
                <span class="icon" src="" href="" ></span>
              </div>
            </footer>
 </div>
            
            
