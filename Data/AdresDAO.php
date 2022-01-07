<?php
declare(strict_types=1);

namespace Data;

use PDO;
use Data\DBConfig;
use Entities\Adres;
use Data\PlaatsDAO;

class AdresDAO {

    public function createAdres(string $straat, string $huisnummer, string $bus, int $plaatsId): ?Adres
    {
        try {
            $plaats = new PlaatsDAO();
            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $stmt = $dbh->prepare("insert into adressen (straat, huisnummer, bus, plaatsId) values (:straat, :huisnummer, :bus, :plaatsId)");
            $stmt->bindValue(":straat", $straat);
            $stmt->bindValue(":huisnummer", $huisnummer);
            $stmt->bindValue(":bus", $bus);
            $stmt->bindValue(":plaatsId", $plaatsId);
            $stmt->execute();
            $adresId = $dbh->lastInsertId();
            $dbh = null;
            return new Adres((int)$adresId, $straat, $huisnummer, $bus, $plaats->getById($plaatsId));


        } catch (\PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }
        return null;
    }

    public function getById($adresId) : ?Adres
    {
        try {
            $plaats = new PlaatsDAO();
            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $stmt = $dbh->prepare("select * from adressen where adresId = :adresId");
            $stmt->bindValue(":adresId", $adresId);
            $stmt->execute();
            $rij = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $dbh = null;
            return new Adres((int) $rij["adresId"], $rij["straat"], $rij["huisnummer"], $rij["bus"], $plaats->getById($rij["plaatsId"]));

        }  catch (\PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }
        return null;
    }


}