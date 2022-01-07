<?php
declare(strict_types=1);

namespace Business;

use Data\KlantDAO;
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
    public function registreerKlant(string $email, string $wachtwoord, string $familienaam, string $voornaam, Adres $adres, bool $promo, string $opmerking): ?Klant
    {
        return $this->klantDAO->createKlant($email, $wachtwoord, $familienaam, $voornaam, $adres, $promo, $opmerking);
    }
    public function loginKlant(string $email, string $wachtwoord): ?Klant
    {
        return $this->klantDAO->login($email, $wachtwoord);
    }
}
