<?php
declare(strict_types=1);

namespace Business;

use Data\BestellijnDAO;
use Entities\Bestellijn;
use Entities\Bestelling;
use Entities\Klant;
use DateTime;
use Entities\Product;

class BestellijnService {

    private BestellijnDAO $bestellijnDAO;

    public function __construct()
    {
        $this->bestellijnDAO = new BestellijnDAO();
    }

    public function createBestellijn(Bestelling $bestelling, Product $product, int $aantalBesteld, float $bestelprijs): ?Bestellijn
    {
        return $this->bestellijnDAO->createBestellijn($bestelling, $product, $aantalBesteld, $bestelprijs);
    }

}
