<?php
include 'AutoLoader.php';
include_once 'connection.php';

session_start();
//echo $_SESSION['User'];

$id = intval($_GET['id']);
$sql = "SELECT * FROM Films"
        . " INNER JOIN Genres on Films.fm_GENRE = Genres.gn_ID"
        . " INNER JOIN Directors on Films.fm_DIR = Directors.dir_ID"
        . " INNER JOIN Towns on Films.fm_TOWN = Towns.twn_ID"
        . " INNER JOIN Images on Films.fm_ID = Images.img_ID"
        . " WHERE fm_ID = '" . $id . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$year = $row['fm_YEAR'];
$title = $row['fm_TITLE'];
$dir = $row['dir_NAME'];
$age = $row['fm_RATING'];
$genre = $row['genre'];
$length = $row['fm_LENGTH'];
$town = $row['twn_NAME'];
$syn = $row['fm_SYNOPSIS'];
$availability = $row['fm_AVAILABILITY'];
$img1 = $row['image_1'];
$img2 = $row['image_2'];
$img3 = $row['image_3'];
$img4 = $row['image_4'];
$img5 = $row['image_5'];
$img6 = $row['image_6'];

$sql2 = "SELECT user_DOB FROM Users WHERE user_ID = '".$_SESSION['User']."';";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$dob = $row2['user_DOB'];

$today = date("Y-m-d");
$diff = date_diff(date_create($dob), date_create($today));
//echo 'Age is '.$diff->format('%y');
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
    </style>
    <head>
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

        <title><?php echo $title ?></title>
        <script>
            function loanFilm(id) {
                {
                    var xhttp;
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("loan").innerHTML = this.responseText;
                        }
                    };
                    window.open("loan.php?id=" + id, true);
                }
            }
        </script>
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

 <!--   
    <div class="headerLogo">
        <img src="Images/reel.png", width="100%" height="100px" background-size: cover />
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Yorkshire Film Library</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="Home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Films.php">Films</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <section>

        <body>
 -->
            <div class="sticky">
                <h2 style="font-size: 40px; font-family: 'Sen', sans-serif; line-height: 1.5;background-color:grey; text-transform: uppercase"><center> <?php echo $title ?></center></h2>
            </div>


            <div id="carousel2" class="carousel slide" data-ride="carousel" >
                <div class="carousel-inner" role="listbox" style="width:100%; height:500px !important;">
                    <div class="carousel-item active">
                        <center><img src="<?php echo $row['image_1']; ?>" style='height:500px' ></center>
                    </div>
                    <div class="carousel-item">
                        <center><img src="<?php echo $row['image_2']; ?>" style='height:500px' ></center>
                    </div>
                    <div class="carousel-item">
                        <center><img src="<?php echo $row['image_3']; ?>" style='height:500px' ></center>
                    </div>
                    <div class="carousel-item">
                        <center><img src="<?php echo $row['image_4']; ?>" style='height:500px' ></center>
                    </div>
                    <div class="carousel-item">
                        <center><img src="<?php echo $row['image_5']; ?>" style='height:500px' ></center>
                    </div>
                    <div class="carousel-item">
                        <center><img src="<?php echo $row['image_6']; ?>" style='height:500px' ></center>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carousel2" role="button" data-slide="prev" style='margin-left:250px'>
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel2" role="button" data-slide="next" style='margin-right:250px'>
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <br>

<?php 

if ($age > $diff->format('%y')) {
    ?>
    <h4 style='text-align: center; background-color: red;'>You are too young to loan out this film.</h4>
<?php
} else if ($availability == 'Available') {
    ?>
                <div id="loan">
                    <a onclick="loanFilm(<?php echo $id; ?>)">
                        <div style="text-align: center">
                            <button>Loan Film</button>
                        </div>
                        <br>
                    </a>
                </div>
    <?php
} else {
    ?>
                <h4 style='text-align: center; background-color: grey'>Film is currently on loan.</h4>
                <?php
            }

            ?>
                
            <p style="text-align:center;font-family: 'Sen', sans-serif;">  
                <b>Year Released:</b> <?php echo $year; ?>
            </p>
            <p style="text-align:center;font-family: 'Sen', sans-serif;">  
                <b>Title:</b> <?php echo $title; ?>
            </p>
            <p style="text-align:center;font-family: 'Sen', sans-serif;">  
                <b>Director:</b> <?php echo $dir; ?>
            </p>    
            <p style="text-align:center;font-family: 'Sen', sans-serif;">  
                <b>Age Rating:</b> <?php echo $age; ?>
            </p>
            <p style="text-align:center;font-family: 'Sen', sans-serif;">  
                <b>Genre:</b> <?php echo $genre; ?>
            </p>
            <p style="text-align:center;font-family: 'Sen', sans-serif;">  
                <b>Length:</b> <?php echo $length . "min"; ?>
            </p>
            <p style="text-align:center;font-family: 'Sen', sans-serif;">  
                <b>Location:</b> <?php echo $town; ?>
            </p>
            <br>
            <p style="width:700px; text-align:justify; margin-left:10cm;font-family: 'Sen', sans-serif;">
                <b>Synopsis: </b> <?php echo $syn; ?>
            </p>
        </body>
    </section>
</html>