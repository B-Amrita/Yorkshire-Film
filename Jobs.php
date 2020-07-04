<!DOCTYPE html>
<html>
    <style>
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
    .center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
    }    
        
    </style>
    <head>
        <title> Yorkshire Films: Home </title>
        <link rel=stylesheet href="home.css">
        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"  crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"  crossorigin="anonymous">
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
          <li><a href= "films.php">FILMS</a></li>
          <li><a href= "login.php">LOG IN</a></li>
           <li><a href= "MembersAccount.php">MY ACCOUNT</a></li>
        </ul>
      </nav>

      <!--javascript function that triggers the hamburger menu when min-width is 480px-->
      <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
      

      
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

            <!--Carousel showing most popular movies-->
            <section>
            <h1 class = "popular-fm"> Hey girl, wanna be my developer?</h1>
            <img src="Images/Ryan.jpg" class="center">


            <!--footer-->
            <footer>
              <div class="info-container">
                <p class="info"><a href="">HELP</a></p>
                <p class="info"><a href="">PRIVACY POLICY</a></p>
                <p class= "info"><a href="">JOBS</a></p>
              </div>

            </footer>
    </body>
</html>