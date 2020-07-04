<?php
include 'AutoLoader.php';

session_start();
//echo $_SESSION['User'];

//Added a member through here just so it prints something for me. 
//$member1 = new Member('Jeff12','Jeff', 'Bezos', 'sellallthethings@bigshop.com', '1964-01-12', '07152745282');
//$member1 ->setPassword("hello345");


if(isset($_GET['id']) && !empty($_GET['id']))
{
   $id = $_GET['id'];
    include_once('connection.php');
   
    $loan = "INSERT INTO Onloan (fm_ID, user_ID, loan_DATE, due_DATE) VALUES (".$id.", ".$_SESSION['User'].", SYSDATE(), DATE_ADD(SYSDATE(), INTERVAL 5 DAY));"; 
    $loanresult = mysqli_query($conn, $loan);
    
    $title = "SELECT fm_TITLE FROM Films WHERE fm_ID = '".$id."';";
    $titleresult = mysqli_query($conn, $title);
    $row1 = mysqli_fetch_row($titleresult);
    
    $duedate = "SELECT due_DATE FROM Onloan WHERE fm_ID = '".$id."';";
    $duedateresult = mysqli_query($conn, $duedate);
    $row2 = mysqli_fetch_row($duedateresult);
    
    $update = "UPDATE Films SET fm_LOANCOUNT = fm_LOANCOUNT + 1 WHERE fm_ID = '".$id."';";
    $updateresult = mysqli_query($conn, $update);
    $update1 = "UPDATE Films SET fm_AVAILABILITY = 'Not available' WHERE fm_ID = '".$id."';";
    $update1result = mysqli_query($conn, $update1);
    
    $loanimage = "SELECT image_1 FROM IMAGES WHERE img_ID = '".$id."';";
    $loanimageresult = mysqli_query($conn, $loanimage);
    $loanimg = mysqli_fetch_row($loanimageresult);
    
    $image = "SELECT image_1, img_ID FROM Images "
    . " INNER JOIN Films on img_ID = fm_ID "
    . " WHERE img_ID !='".$id."' AND fm_AVAILABILITY = 'Available';";
    $imageresult = mysqli_query($conn, $image);
    $row3 = mysqli_fetch_all($imageresult);
    
    $rand = array_rand($row3, 3);
    
    $name = "SELECT user_FN FROM Users WHERE user_ID = '".$_SESSION['User']."';";
    $nameresult = mysqli_query($conn, $name);
    $namerow = mysqli_fetch_row($nameresult);
}
?>

<!DOCTYPE html>
<html>
    <style>
        div.sticky {
            position: -webkit-sticky; 
            position: sticky;
            top: 0;
            z-index: 2;
        }
    </style>
    <head>
        <script>
    function showFilm(str) {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("films").innerHTML = this.responseText;
    }
  };
  window.location.replace("fm.php?id="+str, true);
  
}
    </script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
                 
        <link rel=stylesheet href="account.css">
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

        <title>Loan Page</title>
    </head>
        
           <section>

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
    
            <div class="sticky">
                <h2 style="font-size: 40px; font-family: 'Sen', sans-serif; line-height: 1.5;background-color:grey; text-transform: uppercase"><center> Your Loan </center></h2>
            </div>

            <br>
            <div>
                <center><img src="<?php echo $loanimg[0];?>" style='height:500px' ></center>
                <br>
                <p style="text-align:center; font-family: 'Sen', sans-serif;"><?php echo $namerow[0];?> , you have borrowed <?php  echo $row1[0] . ".";?></p>
                <p style="text-align:center; font-family: 'Sen', sans-serif;">Your due date is <?php echo $row2[0] . ".";?></p>
                <br>
                <h3 style="text-align:center; font-family: 'Sen', sans-serif;">Films other users have enjoyed:</h3>
                
                
                <center>
                    <div id='films'>
                <a onclick='showFilm(<?php echo $row3[$rand[0]][1]?>)'>
                    <img src="<?php echo $row3[$rand[0]][0];?>" style='height:500px'>
                </a>
                <a onclick='showFilm(<?php echo $row3[$rand[1]][1]?>)'>
                    <img src="<?php echo $row3[$rand[1]][0];?>" style='height:500px'>
                </a>
                <a onclick='showFilm(<?php echo $row3[$rand[2]][1]?>)'>        
                    <img src="<?php echo $row3[$rand[2]][0];?>" style='height:500px'>
                </a>
                </center>
               
            </div>
                
        </body>
    </section>
</html>
