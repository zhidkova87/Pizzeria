<?php
declare(strict_types=1);

spl_autoload_register();

use Business\ProductService;

session_start();

if(!isset($_SESSION["klantAccount"]))
{
    $aangemeld = false;
} else {
    $aangemeld = true;
}

$productSvc = new ProductService();
$producten = $productSvc->toonProductenOverzicht();

if(isset($_POST["btnToevoegen"])) {
    if (!isset($_SESSION["winkelmandje"])) {
        $_SESSION["winkelmandje"] = array();
            $productId = (int)$_GET["productId"];
            $_SESSION["winkelmandje"][$productId] = 1;
        } else {
        $productId = (int)$_GET["productId"];
            if (isset($_SESSION["winkelmandje"][$productId])) {
                $_SESSION["winkelmandje"][$productId]++;

            } else {
                $_SESSION["winkelmandje"][$productId] = 1;
            }
        }
    header("location:menu.php");
    exit(0);
    }

if(isset($_POST["btnMin"])) {
    $_SESSION["winkelmandje"][$_POST["btnMin"]] --;
    if ($_SESSION["winkelmandje"][$_POST["btnMin"]] === 0) {
        unset($_SESSION["winkelmandje"][$_POST["btnMin"]]);
        header("location: menu.php");
        exit(0);
    }

}
if(isset($_POST["btnPlus"])) {
    $_SESSION["winkelmandje"][$_POST["btnPlus"]] ++;
}

if(isset($_POST["btnAfrekenen"])) {
    if($aangemeld) {
        header("location: afrekenen.php");
    } else {
        header("location: login.php");
    }
    exit(0);
}



include_once ("Presentation/menuPagina.php");