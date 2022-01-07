<?php
declare(strict_types=1);

namespace Business;

use Data\AdresDAO;
use Entities\Adres;

class AdresService {

    private AdresDAO $adresDAO;

    public function __construct()
    {
        $this->adresDAO = new AdresDAO();
    }
    public function haalAdresOp(int $adresId): ?Adres
    {
        return $this->adresDAO->getById($adresId);
    }
    public function createAdres(string $straat, string $huisnummer, string $bus, int $plaatsId): ?Adres
    {
        return $this->adresDAO->createAdres($straat, $huisnummer, $bus, $plaatsId);
    }
}