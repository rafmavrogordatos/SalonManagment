<?php
//We start sessions
session_start();

/******************************************************
------------------Required Configuration---------------
Please edit the following variables so the members area
can work correctly.
******************************************************/

//We log to the DataBase
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con,'succsteps');

//Webmaster Email
$mail_webmaster = 'developer@succsteps.com';

//Top site root URL
$url_root = 'http://www.succsteps.com/';

/******************************************************
-----------------Optional Configuration----------------
******************************************************/

//Home page file name
$url_home = 'index.php';

//Design Name
$design = 'default';
?>