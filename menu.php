<?php
declare(strict_types=1);

spl_autoload_register();

use Business\ProductService;
session_start();

if(!isset($_SESSION["klant"])) {
    $aangemeld = false;
}


$productSvc = new ProductService();
$producten = $productSvc->toonProductenOverzicht();

print_r(count($_SESSION["winkelmandje"]));

if(isset($_POST["btnToevoegen"])) {
    if (!isset($_SESSION["winkelmandje"])) {
        $_SESSION["winkelmandje"] = array();
        $productId = (int)$_GET["productId"];
            $_SESSION["winkelmandje"][$productId] = 1;
        } else {
        $productId = (int)$_GET["productId"];
            if ($_SESSION["winkelmandje"][$productId]) {
                $_SESSION["winkelmandje"][$productId]++;

            } else {
                $_SESSION["winkelmandje"][$productId] = 1;
            }
        }
    }

if(isset($_POST["btnMin"])) {
    $_SESSION["winkelmandje"][$_POST["btnMin"]] --;
    if ($_SESSION["winkelmandje"][$_POST["btnMin"]] === 0) {
        unset($_SESSION["winkelmandje"][$_POST["btnMin"]]);
    }
//    if(count($_SESSION["winkelmandje"]) === 0) {
//        unset($_SESSION["winkelmandje"]);
//    }

}
if(isset($_POST["btnPlus"])) {
    $_SESSION["winkelmandje"][$_POST["btnPlus"]] ++;
}

if(isset($_POST["btnAfrekenen"])) {
    header("location: afrekenen.php");
}



include_once ("Presentation/menuPagina.php");