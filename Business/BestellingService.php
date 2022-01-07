<?php
declare(strict_types=1);

namespace Business;

use Data\BestellingDAO;
use Entities\Bestelling;
use Entities\Klant;
use DateTime;

class BestellingService {

    private BestellingDAO $bestellingDAO;

    public function __construct()
    {
        $this->bestellingDAO = new BestellingDAO();
    }

    public function createBestelling(Klant $klant, DateTime $bestelmoment, $opmerking): ?Bestelling
    {
        return $this->bestellingDAO->createBestelling($klant, $bestelmoment, $opmerking);
    }

}