<?php
declare(strict_types=1);

spl_autoload_register();

if(!isset($_SESSION)) 
{ 
    session_start(); 
}


session_destroy(); 

$aangemeld = false;
header("location: login.php");
exit(0);



