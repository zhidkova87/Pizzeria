<?php
declare(strict_types=1);

namespace Business;

use Data\KlantDAO;
use Data\AdresDAO;
use Entities\Adres;
use Entities\Klant;

class KlantService {

    private KlantDAO $klantDAO;

    public function __construct()
    {
        $this->klantDAO = new KlantDAO();
    }
    public function haalKlantAccountOp(int $klantId): ?Klant
    {
        return $this->klantDAO->getById($klantId);
    }
    public function registreerKlant(string $email, string $wachtwoord, string $familienaam, string $voornaam, Adres $adres, string $telefoonnummer, bool $promo, string $opmerking): ?Klant
    {
        return $this->klantDAO->createKlant($email, $wachtwoord, $familienaam, $voornaam, $adres, $telefoonnummer, $promo, $opmerking);
    }
    public function loginKlant(string $email, string $wachtwoord): ?Klant
    {
        return $this->klantDAO->login($email, $wachtwoord);
    }
    public function updateKlant(Klant $klant, $email, $familienaam, $voornaam, $telefoonnummer, $opmerking)
    {
        $klant->setEmail($email);
        $klant->setFamilienaam($familienaam);
        $klant->setVoornaam($voornaam);
        $klant->setTelefoonnummer($telefoonnummer);
        $klant->setOpmerking($opmerking);
        $this->klantDAO->updateKlant($klant);

    }
}
