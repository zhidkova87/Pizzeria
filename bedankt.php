<?php
declare(strict_types=1);

spl_autoload_register();

session_start();

if(!isset($_SESSION["gebruiker"])){
    $aangemeld = false;
} else {
    $aangemeld=true;
}

include_once("Presentation/bedanktPagina.php");


