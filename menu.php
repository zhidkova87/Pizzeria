<?php
declare(strict_types=1);

spl_autoload_register();

use Business\ProductService;
session_start();

if(!isset($_SESSION["klant"])) {
    $aangemeld = false;
}

$productSvc = new ProductService();
$producten = $productSvc->getAllProducten();

include_once ("Presentation/menuPagina.php");