<?php
declare(strict_types=1);

namespace Data;

use Entities\Bestelling;
use Entities\Product;
use PDO;
use Data\DBConfig;
use Entities\Bestellijn;

class BestellijnDAO {

    public function createBestellijn(Bestelling $bestelling, Product $product, int $aantalBesteld, float $bestelprijs): ?Bestellijn
    {
        try {
            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $stmt = $dbh->prepare("insert into bestellijnen (bestelId, productId, aantalBesteld, bestelprijs) VALUES (:bestelId, :productId, :aantalBesteld, :bestelprijs)");
            $stmt->bindValue("bestelId", $bestelling->getBestelId());
            $stmt->bindValue("productId", $product->getProductId());
            $stmt->bindValue("aantalBesteld", $aantalBesteld);
            $stmt->bindValue("bestelprijs", $bestelprijs);
            $stmt->execute();
            $bestellijnId = $dbh->lastInsertId();
            $dbh = null;

            return new Bestellijn((int)$bestellijnId, $bestelling, $product, $aantalBesteld, $bestelprijs);

        } catch (\PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }
        return null;
    }
}