<?php
declare(strict_types=1);

spl_autoload_register();

use Business\KlantService;
session_start();

if(!isset($_SESSION["klantAccount"])){
    $aangemeld = false;
} else {
    $aangemeld=true;
}
if(isset($_POST["btnMenu"])) {
    header("location: menu.php");
    exit(0);
}

include_once("Presentation/bedanktPagina.php");


