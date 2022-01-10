<?php
declare(strict_types=1);
spl_autoload_register();

session_start();
use Business\KlantService;
use Business\PlaatsService;
use Business\AdresService;
use Exceptions\UserNotFoundException;
use Exceptions\InvalidPasswordException;

if(!isset($_SESSION["klantAccount"]))
{
    $aangemeld = false;
}

$klantSvc = new KlantService();
$plaatsSvc = new PlaatsService();
$adresSvc = new AdresService();
$error = "";

if (isset($_GET["action"]) && ($_GET["action"]) === "login") {
    $email = trim($_POST["txtEmail"]);
    $wachtwoord = $_POST["txtWachtwoord"];

    try {
        $klantAccount = $klantSvc->loginKlant($email, $wachtwoord);
        //$_SESSION["klantAccount"] = serialize($klantAccount);
        $_COOKIE["klantEmail"] = $email;

    } catch (UserNotFoundException $e) {
        $error = "Klant bestaat niet.";
    } catch (InvalidPasswordException $e) {
        $error = "Wachtwoord is niet correct";
    } catch (Exception $e) {
        $error = "Onbekende fout: kan niet inloggen";
    }
}
if (isset($_GET["action"]) && $_GET["action"] === "registreren") {
    $familienaam = $_POST["txtFamilienaam"];
    $voornaam = $_POST["txtVoornaam"];
    $straat = $_POST["txtStraat"];
    $huisnummer = $_POST["txtHuisnummer"];
    $bus = $_POST["txtBus"];
    $postcode = (int)$_POST["postcode"];
    $telefoonnummer = $_POST["txtTelefoonnummer"];
    $opmerking = $_POST["txtOpmerking"];
    $email = $_POST["txtEmail"];
    $wachtwoord = $_POST["txtWachtwoord"];
    try {
        $adres = $adresSvc->createAdres($straat, $huisnummer, $bus, $postcode);
        $klantAccount = $klantSvc->registreerKlant($email, $wachtwoord, $familienaam, $voornaam, $adres, false, $opmerking);
    } catch (Exception $e) {
        $error = "Onbekende fout: kan niet registreren";
    }
}
$plaatsen = $plaatsSvc->toonPostcodesOverzicht();

include ("Presentation/loginPagina.php");
