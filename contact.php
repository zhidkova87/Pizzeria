<?php
declare(strict_types=1);

spl_autoload_register();

use Business\ProductService;

session_start();

if(!isset($_SESSION["klant"])) {
    $aangemeld = false;
}

$bestelMoment = new DateTime();
$productSvc = new ProductService();



include_once("Presentation/contactPagina.php");