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
$melding = "";

if(isset($_POST["btnVerstuur"])) {
    $naam = $_POST["txtNaam"];
    $email = $_POST["txtEmail"];
    $onderwerp = $_POST["txtOnderwerp"];
    $bericht = $_POST["txtBericht"];

    $to = "pizzeria@gmail.be";
    $header = "From: {$naam} . {$email}";

    $versturen = mail($to, $onderwerp, $bericht, $header);

    if($versturen === true ) {
       $melding = "Message sent successfully...";
    }else {
        $melding = "Message could not be sent...";
    }


}



include_once("Presentation/contactPagina.php");