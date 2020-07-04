<?php

include 'AutoLoader.php';
include 'PDO_connection.php';

$stmt = $pdo->prepare("SELECT * FROM Films WHERE fm_ID = ?");
    $stmt->execute([$_GET['fm_ID']]);


        
/*$stmt = $pdo->prepare('SELECT * FROM Users WHERE user_ID = ?');    
$deleted = $pdo->exec("DELETE * FROM Users WHERE user_ID = ?");
$stmt->execute([$GET['user_ID']]);*/

?>

<!DOCTYPE html>
<!-----------------------HEAD------------------------>  
<html>
    <head>
        <title>Yorkshire films - Update User</title>
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
    </head>
    <body>
        
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
        
      

    
     <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

            <script type="text/javascript">
                $(document).ready(function () {
                    $('.toogle').click(function () {
                        $('ul').toogleClass('active');
                    });
                });
            </script>
            
  <div class="flex-container">
                <div>BROWSE</div>
                <div>BORROW</div>
                <div>ENJOY</div>
                <div>REPEAT</div>
            </div>
            
            <style>
                
                .msg {
                    text-align: center;
                }
                .del {
                    text-align: center;
                    text-transform: uppercase;
                    margin-top: 50px;
                    
                }
            </style>
    </body>
</html>

<?php

if (isset($_GET['fm_ID'])) {
	$id = $_GET['fm_ID'];
	$pdo->query("DELETE FROM Films WHERE fm_ID= " . $id . "; ");
	echo "<div class='msg'>
        <h2 class='del'>Film has been deleted</h2>
        </div>";
}

?>
