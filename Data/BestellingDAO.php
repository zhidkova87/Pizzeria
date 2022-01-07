<?php
declare(strict_types=1);

namespace Data;

use PDO;
use Data\DBConfig;
use Entities\Bestelling;
use Entities\Klant;
use DateTime;

class BestellingDAO {

    public function createBestelling(Klant $klant, DateTime $bestelmoment, $opmerking): ?Bestelling
    {
        try {
            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $stmt = $dbh->prepare("insert into bestellingen (klantId, bestelmoment, opmerking) VALUES (:klantId, :bestelmoment, :opmerking)");
            $stmt->bindValue("klantId", $klant->getKlantId());
            $stmt->bindValue("bestelmoment", $bestelmoment->format("Y-m-d H:i"));
            $stmt->bindValue("opmerking", $opmerking);
            $stmt->execute();
            $bestelId = $dbh->lastInsertId();
            $dbh = null;

            return new Bestelling((int)$bestelId, $klant, $bestelmoment, $opmerking);

        } catch (\PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }
        return null;
    }
}
