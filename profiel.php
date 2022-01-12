<?php
declare(strict_types=1);

spl_autoload_register();

use Business\PlaatsService;
use Business\AdresService;
use Business\KlantService;

session_start();

if(!isset($_SESSION["klantAccount"]))
{
    $aangemeld = false;
} else {
    $aangemeld = true;
}

$klantSvc = new KlantService();
$adresSvc = new AdresService();
$plaatsSvc = new PlaatsService();
$plaatsen = $plaatsSvc->toonPostcodesOverzicht();
$klant = unserialize($_SESSION["klantAccount"]);


if(isset($_POST["btnBewerken"])) {
    $email = $_POST["txtEmail"];
    $familienaam = $_POST["txtFamilienaam"];
    $voornaam = $_POST["txtVoornaam"];
    $straat = $_POST["txtStraat"];
    $huisnummer = $_POST["txtHuisnummer"];
    $bus = $_POST["txtBus"];
    $plaatsId = (int)$_POST["postcode"];
    $telefoonnummer = $_POST["txtTelefoonnummer"];
    $opmerking = $_POST["txtOpmerking"];

    $adresSvc->updateAdres($klant->getAdres()->getAdresId(), $straat, $huisnummer, $bus, $plaatsId);
    $klantSvc->updateKlant($klant, $email, $familienaam, $voornaam, $telefoonnummer, $opmerking);

    $klant = $klantSvc->haalKlantAccountOp($klant->getKlantId());
    $_SESSION["klantAccount"] = serialize($klant);

    header("location:profiel.php");
    exit(0);
}


include_once("Presentation/profielPagina.php");
