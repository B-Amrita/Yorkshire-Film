<?php
include 'AutoLoader.php';
include 'AccountProgram.php';

?>

<!DOCTYPE html>
<!-----------------------HEAD------------------------>  
<html>
    <head>
        <title>Yorkshire films - Add a Film</title>
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

<!-----------------------Add film form------------------------>  


<div class="add-form"> 
               
                
             <h2>Add a film</h2>

                
                
                <div><?php echo $fmMsg; ?></div>

                
                
                <form name="filmForm" class="filmForm" id="filmForm" action = "" method = "POST">

                Film name:<input  type="text" class="form-control" placeholder="Enter the film name"  name="filmName" id="filmName" value="" required autofocus="true" />             
                <br/>     
                <div class="form-group">
                <div class="row">
                <div class="col">
                Film ID:<input  type="text" class="form-control" placeholder="Enter the film id"  name="filmID" id="filmID" value="" required autofocus="true" />        
                </div>
                <div class="col">
                Film length:<input  type="text" class="form-control" placeholder="Enter length of film"  name="filmLength" id="filmLength" value="" required autofocus="true" />          
                </div>
                </div>
                     </div>
                <br/>  
                
                <div class="form-group">
                <div class="row">
                <div class="col">
                Film rating:<select class="custom-select" name="filmRating" id="filmRating"  placeholder="Enter film rating" size="1" required>
                        <option value="U">U</option>
                        <option value="PG">PG</option>
                        <option value="12A">12A</option>
                        <option value="15">15</option>
                        <option value="18">18</option>
                    </select>
                </div> 
                <div class="col">
                Year:<input  type="text" class="form-control" placeholder="Enter year made"  name="filmYear" id="filmYear" value="" required autofocus="true" />     
                </div>
                </div></div>
                <br/>
                

                <div class="form-group">
                <div class="row">
                <div class="col">
                Genre:<select class="custom-select" name="filmGenre" id="filmGenre"  placeholder="Enter a genre" size="1" required>
                        <option value="1">Animation</option>
                        <option value="2">Biography</option>
                        <option value="3">Comedy</option>
                        <option value="4">Crime</option>
                        <option value="5">Drama</option>
                        <option value="6">Mystery</option>
                        <option value="7">Romance</option>
                        <option value="8">Sci-fi</option>
                        <option value="9">Sport</option>
                    </select>
                </div> 
                <div class="col">        
                Director:<select class="custom-select" name="filmDirector" id="filmDirector"  placeholder="Enter a genre" size="1" required>
                    <option value="1">Andrea Arnold</option>
                        <option value="2">Cary Joji Fukunaga</option>
                        <option value="3">Christopher Morris</option>
                        <option value="4">Clio Barnard</option>
                        <option value="5">Dan Hartley</option>
                        <option value="6">David Hare</option>
                        <option value="7">Francis Lee</option>
                        <option value="8">Gordon Parry</option>
                        <option value="9">Jack Clayton</option>
                        <option value="10">John Schlesinger</option>
                        <option value="11">Ken Loach</option>
                        <option value="12">Lance Comfort</option>
                        <option value="13">Lindsay Anderson</option>
                        <option value="14">Lionel Jeffries</option>
                        <option value="15">Mark Herman</option>
                    </select>
                    </div>
                    </div></div>
                    <br/>

                    
                <div class="form-group">
                <div class="row">
                <div class="col">  
                Availability:<select class="custom-select" name="filmAvailability" id="filmAvailability"  placeholder="Enter film availability" size="1" required>
                        <option value="Available">Available</option>
                        <option value="Unavailable">Unavailable</option>
                    </select>  
                </div> 
                <div class="col"> 
                Town:<select class="custom-select" name="filmTown" id="filmTown"  placeholder="Enter a genre" size="1" required>
                        <option value="1">Barnsley</option>
                        <option value="2">Bradford</option>
                        <option value="3">Grimethorpe</option>
                        <option value="4">Halifax</option>
                        <option value="5">Keighley</option>
                        <option value="6">Kettlewell</option>
                        <option value="7">Leeds</option>
                        <option value="8">Rotherham</option>
                        <option value="9">Settle</option>
                        <option value="10">Sheffield</option>
                        <option value="11">Skipton</option>
                        <option value="12">Todmorden</option>
                        <option value="13">Wakefield</option>
                        <option value="14">Wetherby</option>
                        <option value="15">Yorkshire</option>
                    </select>
                </div>
                </div></div>
                <br/>
                
                Synopsis:<textarea id="filmSynopsis" class="form-control" placeholder="Enter film synopsis"  name="filmSynopsis"  value="" required autofocus="true"rows="4" cols="50"></textarea>
                <br/>
                
              
           <input type="submit" value=" Add Film " name="fmSubmit" id="submit-button" class="btn btn-primary" onclick="clearField()" />

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