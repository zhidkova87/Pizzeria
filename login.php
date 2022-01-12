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
} else {
    $aangemeld = true;
}


$klantSvc = new KlantService();
$plaatsSvc = new PlaatsService();
$adresSvc = new AdresService();
$error = "";

if (isset($_GET["action"]) && ($_GET["action"]) === "aanmelden") {
    $email = trim($_POST["txtEmail"]);
    $wachtwoord = $_POST["txtWachtwoord"];

    try {
        $klant = $klantSvc->loginKlant($email, $wachtwoord);
        $_SESSION["klantAccount"] = serialize($klant);
        setcookie("email", $email);
        header("location: afrekenen.php");

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
        $klant = $klantSvc->registreerKlant($email, $wachtwoord, $familienaam, $voornaam, $adres, $telefoonnummer,false, $opmerking);
        $_SESSION["klantAccount"] = serialize($klant);
        setcookie("email", $email);
    } catch (Exception $e) {
        $error = "Onbekende fout: kan niet registreren";
    }
    header("location: afrekenen.php");
    exit(0);
}
$plaatsen = $plaatsSvc->toonPostcodesOverzicht();

include ("Presentation/loginPagina.php");
