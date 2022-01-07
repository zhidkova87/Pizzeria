<?php
declare(strict_types=1);

spl_autoload_register();

session_start();

use Business\ProductService;

$productSvc = new ProductService();
$producten = $productSvc->getAllProducten();

include_once("Presentation/indexPagina.php");