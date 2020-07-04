<?php
include 'AutoLoader.php';
include_once 'connection.php';

session_start();
//echo $_SESSION['User'];
?>

<!DOCTYPE html>
<html>
    <style>
        .filterDiv {
            float: left;
            width: auto;
            height: 500px;
            margin: 2px;
            display: none;
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

        .show {
            display: block;
        }


        .image {
            display: block;
        }

        .overlay {
            position: absolute; 
            bottom: 0; 
            background: rgb(0, 0, 0);
            background: rgba(0, 0, 0, 0.5); /* Black see-through */
            color: #f1f1f1; 
            width: 100%;
            transition: .5s ease;
            opacity:0;
            color: white;
            font-size: 18px;
            font-family: 'Sen', sans-serif;
            text-align: center;
        }

        .show {
            display: block;
        }

        .cont {
            position: relative;
            width: 100%;
            margin-top: 20px;
            overflow: hidden;
        }

        .cont:hover 
        .overlay {
            opacity: 1;
        }


        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial;
        }

        .header {
            text-align: center;
            padding: 32px;
        }

        .row {
            display: -ms-flexbox; /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap; /* IE10 */
            flex-wrap: wrap;
            padding: 5px;
        }

        /* Create four equal columns that sits next to each other */
        .column {
            -ms-flex: 25%; /* IE10 */
            flex: 25%;
            max-width: 25%;
            padding: 5px;
        }

        .column img {
            margin-top: 10px;
            vertical-align: middle;
            width: 100%;
        }

        /* Responsive layout - makes a two column-layout instead of four columns */
        @media screen and (max-width: 800px) {
            .column {
                -ms-flex: 50%;
                flex: 50%;
                max-width: 50%;
            }
        }

        /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
            .column {
                -ms-flex: 100%;
                flex: 100%;
                max-width: 100%;
            }
        }
        * {box-sizing: border-box;}


        div.sticky {
            position: -webkit-sticky; 
            position: sticky;
            top: 0;
            z-index: 2;
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
        <title>Film Catalogue</title>
        <script>
            function showFilm(str) {
                var xhttp;
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("films").innerHTML = this.responseText;
                    }
                };
                window.location.replace("fm.php?id=" + str, true);
            }
        </script>
    </head>
        <section>

        <body>
            <!--
    <div class="headerLogo">
        <img src="Images/reel.png", width="100%" height="100px" background-size: cover />
    </div>
            -->
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
 
    <!-- My previous nav bar
    
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
                    <a class="nav-link" href="Films.php">Films<span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>


            <div class="sticky">
                <h1 style="font: 25px Georgia, serif; line-height: 1.8;background-color:grey;" ><center> YORKSHIRE FILMS</center></h1>
            </div>
-->

            <div id="myBtnContainer" style="font-family: 'Sen', sans-serif;">
                <button class="btn active" onclick="filterSelection('all')">Show All</button>
                <button class="btn" onclick="filterSelection('Animation')">Animation</button>
                <button class="btn" onclick="filterSelection('Biography')">Biography</button>
                <button class="btn" onclick="filterSelection('Comedy')">Comedy</button>
                <button class="btn" onclick="filterSelection('Crime')">Crime</button>
                <button class="btn" onclick="filterSelection('Drama')">Drama</button>
                <button class="btn" onclick="filterSelection('Mystery')">Mystery</button>
                <button class="btn" onclick="filterSelection('Romance')">Romance</button>
                <button class="btn" onclick="filterSelection('Sci-fi')">Sci-fi</button>
                <button class="btn" onclick="filterSelection('Sport')">Sport</button>
            </div>

            <div class="row" id="films">
                <div class="column">
                    <a  onclick="showFilm(1)">
                        <div class="cont">
                            <div class="filterDiv Drama">
                                <img src="Images/fm_ID1_Journeyman.jpg">
                                <div class="overlay">"Journeyman" by Paddy Considine </br> Drama, 2017</div>
                            </div>
                        </div>
                    </a>

                    <a onclick="showFilm(2)">
                        <div class="cont">
                            <div class="filterDiv Mystery">
                                <img src="Images/fm_ID2_DarkRiver.jpg">
                                <div class="overlay">"Dark River" by Clio Barnard </br> Mystery, 2017</div>
                            </div>
                        </div>
                    </a>

                    <a onclick="showFilm(3)">
                        <div class="cont">
                            <div class="filterDiv Drama">
                                <img src="Images/fm_ID3_GodsOwn.jpg">
                                <div class="overlay">"God's Own Country" by Francis Lee </br> Drama, 2017</div>
                            </div>
                        </div>
                    </a>

                    <a onclick="showFilm(4)">
                        <div class="cont">
                            <div class="filterDiv Drama">
                                <img src="Images/fm_ID4_SelfishGiant.jpg">
                                <div class="overlay">"The Selfish Giant" by Clio Barnard </br> Drama, 2013</div>
                            </div>
                        </div>
                    </a>

                    <a onclick="showFilm(5)">
                        <div class="cont">
                            <div class="filterDiv Drama">
                                <img src="Images/fm_ID5_Lad.jpg">
                                <div class="overlay">"Lad: a Yorkshire Story" by Dan Hartley </br> Drama, 2013</div>
                            </div>
                        </div>
                    </a>

                    <a onclick="showFilm(6)">
                        <div class="cont">
                            <div class="filterDiv Romance">
                                <img src="Images/fm_ID6_Wuthering.jpg">
                                <div class="overlay">"Wuthering Heights" by Andrea Arnold </br> Romance, 2011</div>
                            </div>
                        </div>
                    </a>

                    <a onclick="showFilm(7)">
                        <div class="cont">
                            <div class="filterDiv Drama">
                                <img src="Images/fm_ID7_Tyrannosaur.jpg">
                                <div class="overlay">"Tyrannosaur" by Paddy Considine </br> Drama, 2011</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="column">
                    <a onclick="showFilm(8)">
                        <div class="cont">
                            <div class="filterDiv Romance">
                                <img src="Images/fm_ID8_JaneEyre.jpg">
                                <div class="overlay">"Jane Eyre" by Cary Joji Fukunaga </br> Romance, 2011</div>
                            </div>
                        </div>
                    </a>

                    <a onclick="showFilm(9)">
                        <div class="cont">
                            <div class="filterDiv Comedy">
                                <img src="Images/fm_ID9_FourLions.jpg">
                                <div class="overlay">"Four Lions" by Christopher Morris </br> Comedy, 2010</div>
                            </div>
                        </div>
                    </a>

                    <a onclick="showFilm(10)">
                        <div class="cont">
                            <div class="filterDiv Biography">
                                <img src="Images/fm_ID10_DamnedUnited.jpg">
                                <div class="overlay">"The Damned United" by Tom Hooper </br> Biography, 2009</div>
                            </div>
                        </div>
                    </a>

                    <a onclick="showFilm(11)">
                        <div class="cont">
                            <div class="filterDiv Comedy">
                                <img src="Images/fm_ID11_MischiefNight.jpg">
                                <div class="overlay">"Mischief Nights" by Penny Woolcock </br> Comedy, 2006</div>
                            </div>
                        </div>
                    </a>

                    <a onclick="showFilm(12)">
                        <div class="cont">
                            <div class="filterDiv Comedy">
                                <img src="Images/fm_ID12_HistoryBoys.jpg">
                                <div class="overlay">"The History Boys" by Nicholas Hytner </br> Comedy, 2006</div>
                            </div>
                        </div>
                    </a>

                    <a onclick="showFilm(13)">
                        <div class="cont">
                            <div class="filterDiv Romance">
                                <img src="Images/fm_ID13_MySummer.jpg">
                                <div class="overlay">"My Summer Love" by Pawel Pawlikowski </br> Romance, 2004</div>
                            </div>
                        </div>
                    </a>

                    <a onclick="showFilm(29)">
                        <div class="cont">
                            <div class="filterDiv Romance">
                                <img src="Images/fm_ID29_Bedelia.jpg">
                                <div class="overlay">"Bedelia" by Lance Comfort </br> Romance, 1946</div>
                            </div>
                        </div>
                    </a>

                </div>
                <div class="column">

                    <a onclick="showFilm(14)">
                        <div class="cont">
                            <div class="filterDiv Comedy">
                                <img src="Images/fm_ID14_CalendarGirls.jpg">
                                <div class="overlay">"Calendar Girls" by Nigel Cole </br> Comedy, 2003</div>
                            </div>
                        </div>
                    </a>

                    <a onclick="showFilm(15)">
                        <div class="cont">
                            <div class="filterDiv Animation">
                                <img src="Images/fm_ID15_ChickenRun.jpg">
                                <div class="overlay">"Chicken Run" by Peter Lord </br> Animation, 2000</div>
                            </div>
                        </div>
                    </a>

                    <a onclick="showFilm(16)">
                        <div class="cont">
                            <div class="filterDiv Romance">
                                <img src="Images/fm_ID16_AmongGiants.jpg">
                                <div class="overlay">"Among Giants" by Sam Miller </br> Romance, 1998</div>
                            </div>
                        </div>
                    </a>

                    <a onclick="showFilm(17)">
                        <div class="cont">
                            <div class="filterDiv Comedy">
                                <img src="Images/fm_ID17_FullMonty.jpg">
                                <div class="overlay">"The Full Monty" by Peter Cattaneo </br> Comedy, 1997</div>
                            </div>
                        </div>
                    </a>

                    <a onclick="showFilm(18)">
                        <div class="cont">
                            <div class="filterDiv Comedy">
                                <img src="Images/fm_ID18_BrassedOff.jpg">
                                <div class="overlay">"Brassed Off" by Mark Herman </br> Comedy, 1996</div>
                            </div>
                        </div>
                    </a>

                    <a onclick="showFilm(19)">
                        <div class="cont">
                            <div class="filterDiv Drama">
                                <img src="Images/fm_ID19_AMonth.jpg">
                                <div class="overlay">"A Month in the Country" by Pat O'Connor </br> Drama, 1987</div>
                            </div>
                        </div>
                    </a>

                    <a onclick="showFilm(20)">
                        <div class="cont">
                            <div class="filterDiv Mystery">
                                <img src="Images/fm_ID20_Wetherby.jpg">
                                <div class="overlay">"Wetherby" by David Hare </br> Mystery, 1985</div>
                            </div>
                        </div>
                    </a>

                    <a onclick="showFilm(30)">
                        <div class="cont">
                            <div class="filterDiv Romance">
                                <img src="Images/fm_ID30_SouthRiding.jpg">
                                <div class="overlay">"South Riding" by Victor Saville </br> Romance, 1938</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="column">

                    <a onclick="showFilm(21)">
                        <div class="cont">
                            <div class="filterDiv Sci-fi">
                                <img src="Images/fm_ID21_Threads.jpg">
                                <div class="overlay">"Threads" by Mick Jackson </br> Sci-fi, 1984</div>
                            </div>
                        </div>
                    </a>

                    <a onclick="showFilm(22)">
                        <div class="cont">
                            <div class="filterDiv Drama">
                                <img src="Images/fm_ID22_LooksandSmiles.jpg">
                                <div class="overlay">"Looks and Smiles" by Ken Loach </br> Drama, 1981</div>
                            </div>
                        </div>
                    </a>

                    <a onclick="showFilm(23)">
                        <div class="cont">
                            <div class="filterDiv Drama">
                                <img src="Images/fm_ID23_RailwayChildren.jpg">
                                <div class="overlay">"The Railway Children" by Lionel Jeffries </br> Drama, 1970</div>
                            </div>
                        </div>
                    </a>

                    <a onclick="showFilm(24)">
                        <div class="cont">
                            <div class="filterDiv Drama">
                                <img src="Images/fm_ID24_Kes.jpg">
                                <div class="overlay">"Kes" by Ken Loach </br> Drama, 1969</div>
                            </div>
                        </div>
                    </a>

                    <a onclick="showFilm(25)">
                        <div class="cont">
                            <div class="filterDiv Comedy">
                                <img src="Images/fm_ID25_BillyLiar.jpg">
                                <div class="overlay">"Billy Liar" by John Schlesinger </br> Comedy, 1963</div>
                            </div>
                        </div>
                    </a>

                    <a onclick="showFilm(26)">
                        <div class="cont">
                            <div class="filterDiv Sport">
                                <img src="Images/fm_ID26_SportingLife.jpg">
                                <div class="overlay">"This Sporting Life" by Lindsay Anderson </br> Sport, 1963</div>
                            </div>
                        </div>
                    </a>

                    <a onclick="showFilm(27)">
                        <div class="cont">
                            <div class="filterDiv Romance">
                                <img src="Images/fm_ID27_Room.jpg">
                                <div class="overlay">"Room at the Top" by Jack Clayton </br> Romance, 1959</div>
                            </div>
                        </div>
                    </a>

                    <a onclick="showFilm(28)">
                        <div class="cont">
                            <div class="filterDiv Crime">
                                <img src="Images/fm_ID28_TreadSoftly.jpg">
                                <div class="overlay">"Tread Softly Stranger" by Gordon Parry </br> Crime, 1958</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <script>
                filterSelection("all")
                function filterSelection(c) {
                    var x, i;
                    x = document.getElementsByClassName("filterDiv");
                    if (c == "all")
                        c = "";
                    for (i = 0; i < x.length; i++) {
                        w3RemoveClass(x[i], "show");
                        if (x[i].className.indexOf(c) > -1)
                            w3AddClass(x[i], "show");
                    }
                }

                function w3AddClass(element, name) {
                    var i, arr1, arr2;
                    arr1 = element.className.split(" ");
                    arr2 = name.split(" ");
                    for (i = 0; i < arr2.length; i++) {
                        if (arr1.indexOf(arr2[i]) == -1) {
                            element.className += " " + arr2[i];
                        }
                    }
                }

                function w3RemoveClass(element, name) {
                    var i, arr1, arr2;
                    arr1 = element.className.split(" ");
                    arr2 = name.split(" ");
                    for (i = 0; i < arr2.length; i++) {
                        while (arr1.indexOf(arr2[i]) > -1) {
                            arr1.splice(arr1.indexOf(arr2[i]), 1);
                        }
                    }
                    element.className = arr1.join(" ");
                }

// Add active class to the current button (highlight it)
                var btnContainer = document.getElementById("myBtnContainer");
                var btns = btnContainer.getElementsByClassName("btn");
                for (var i = 0; i < btns.length; i++) {
                    btns[i].addEventListener("click", function () {
                        var current = document.getElementsByClassName("active");
                        current[0].className = current[0].className.replace(" active", "");
                        this.className += " active";
                    });
                }
            </script>

        </body>


    </section>

</html>

