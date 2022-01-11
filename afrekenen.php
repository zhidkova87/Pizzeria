<?php
declare(strict_types=1);

spl_autoload_register();

use Business\ProductService;
use Business\BestellingService;
use Business\BestellijnService;


session_start();

if(!isset($_SESSION["klantAccount"]))
{
    $aangemeld = false;
} else {
    $aangemeld = true;
}

$bestelMoment = new DateTime();
$productSvc = new ProductService();
$bestellingSvc = new BestellingService();
$bestellijnSvc = new BestellijnService();
$klant = unserialize($_SESSION["klantAccount"]);


if(isset($_POST["btnBewerken"])) {
    header("location: profiel.php");
    exit(0);
}

if(isset($_POST["btnAfrekenen"])) {
     $opmerking = $_POST["txtOpmerking"];
     if(!empty($_SESSION["winkelmandje"])){
         $bestelling = $bestellingSvc->createBestelling($klant, $bestelMoment, $opmerking);
         foreach ($_SESSION["winkelmandje"] as $key=> $value) {
             $product = $productSvc->haalProductOp($key);
             $aantalBesteld = $value;
             $promo = $klant->isPromo();
             if ($promo === true) {
                 $bestelPrijs = $product->getPromoprijs() ;
             } else {
                 $bestelPrijs = $product->getPrijs();
             }
             $bestellijn = $bestellijnSvc->createBestellijn($bestelling, $product, $aantalBesteld, $bestelPrijs);
             unset($_SESSION["winkelmandje"]);
     }
   }
     header("location: bedankt.php");
     exit(0);
}

if(isset($_POST["btnWinkelmandje"])) {
    header("location: menu.php");
    exit(0);
}


include_once ("Presentation/afrekenenPagina.php");