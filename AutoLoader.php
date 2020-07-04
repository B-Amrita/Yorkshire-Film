<?php        

//This file should automatically load any class if it is saved in the class folder. 
//Include the following at the top of each php file in which classes are needed:
//              include 'AutoLoader.php';

spl_autoload_register('myAutoLoader');

function myAutoLoader($classname) {
$path = "Class/";
$extension = ".php";
$fullpath = $path . $classname . $extension;

include_once $fullpath;

}