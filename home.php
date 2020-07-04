
<!DOCTYPE html>
<html>
    <head>
        <title> Yorkshire Films: Home </title>
        <link rel=stylesheet href="home.css">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"  crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
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
          <li><a href= "home.php" >HOME</a></li>
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
            <h1 class = "popular-fm"> Most Popular Films</h1>

            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" style='width:400px'>
                  <div class="carousel-item active">
                      <img src="Images/fm_ID15_ChickenRun.jpg" class="d-block w-100" id="overlay" alt="chicken run">
                    <div class="carousel-caption d-none d-md-block ">
                        <div class="middle">
                      <p class="caption">Chicken Run</p>
                      
                      </div> 
             
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="Images/fm_ID8_JaneEyre.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <div class="middle">
                          <h5></h5>
                      <p class='caption'>Jane Eyre</p>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="Images/fm_ID6_Wuthering.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <div class="middle"><h5></h5>
                      <p class= 'caption'>Wuthering Heights</p>
                      </div>
                    </div>
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev"  style='margin-left:200px'>
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next" style='margin-right:200px'>
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </section>
            
            <h2 class="view-more"><a href="Films.php" class="view-more-link"> VIEW MORE</a></h2>

            <!--footer-->
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

    </body>
</html>