<?php

$dbServername = "localhost"; //Servername
$dbUsername = "root"; //Username for the server
$dbPassword = ""; //Password for the server
$dbName = "Yorkshire-Films"; //Your database name

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName); //Needs to be in this order!

//refer to variable $conn to access database in other PHP files. Must include this php file as well. 