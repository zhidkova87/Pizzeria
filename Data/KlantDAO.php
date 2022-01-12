<?php
declare(strict_types=1);

namespace Data;

use Exceptions\ClientAlreadyExcistsException;
use Exceptions\UserNotFoundException;
use Exceptions\InvalidPasswordException;
use PDO;
use Data\DBConfig;
use Entities\Klant;
use Entities\Adres;

class KlantDAO {

    public function klantBestaatAl(string $email) : ?int
    {
        try {
            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $stmt = $dbh->prepare("SELECT * FROM klanten WHERE email = :email");
            $stmt->bindValue(":email", $email);
            $stmt->execute();
            $rowCount = $stmt->rowCount();
            $dbh = null;
            return $rowCount;
        } catch (\PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }
        return null;
    }

    public function getById(int $klantId): ?Klant
    {
        try {
            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $stmt = $dbh->prepare("select * from klanten where klantId = :klantId");
            $stmt->bindValue(":klantId", $klantId);
            $stmt->execute();
            $rij = $stmt->fetch(PDO::FETCH_ASSOC);
            $dbh = null;
            $adres = new AdresDAO();
            return new Klant((int)$rij["klantId"], $rij["email"], $rij["wachtwoord"], $rij["familienaam"], $rij["voornaam"], $adres->getById($rij["adresId"]), $rij["telefoonnummer"], (bool)$rij["promo"], $rij["opmerking"]);;

        }  catch (\PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }
        return null;
    }


    public function createKlant(string $email, string $wachtwoord, string $familienaam, string $voornaam, Adres $adres, string $telefoonnummer, bool $promo, string $opmerking): ?Klant
    {

        try {
            $rowCount = $this->klantBestaatAl($email);
            if ($rowCount > 0) {
                throw new ClientAlreadyExcistsException();
            }
                $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
                $stmt = $dbh->prepare("insert into klanten (email, wachtwoord, familienaam, voornaam, adresId, telefoonnummer, promo, opmerking) values (:email, :wachtwoord, :familienaam, :voornaam, :adresId, :telefoonnummer, :promo, :opmerking)");
                $stmt->bindValue(":email", $email);
                $stmt->bindValue(":wachtwoord", password_hash($wachtwoord, PASSWORD_DEFAULT));
                $stmt->bindValue(":familienaam", $familienaam);
                $stmt->bindValue(":voornaam", $voornaam);
                $stmt->bindValue(":adresId", $adres->getAdresId());
                $stmt->bindValue(":telefoonnummer", $telefoonnummer);
                $stmt->bindValue(":promo", false);
                $stmt->bindValue(":opmerking", $opmerking);
                $stmt->execute();
                $klantId = $dbh->lastInsertId();
                $dbh = null;

                return new Klant((int)$klantId, $email, $wachtwoord, $familienaam, $voornaam, $adres, $telefoonnummer, false, $opmerking);

            } catch (\PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
            }
            return null;
        }

    public function login(string $email, string $wachtwoord): ?Klant
    {
        try {
            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $stmt = $dbh->prepare("SELECT * FROM klanten WHERE email = :email");
            $stmt->bindValue(":email", $email);
            $stmt->execute();
            $rij = $stmt->fetch(\PDO::FETCH_ASSOC);

            if (!$rij) {
                throw new UserNotFoundException();
            }

            $isWachtwoordCorrect = password_verify($wachtwoord, $rij["wachtwoord"]);

            if (!$isWachtwoordCorrect) {
                throw new InvalidPasswordException();
            }
            $dbh = null;
            $adres = new AdresDAO();
            return new Klant((int)$rij["klantId"], $rij["email"], $rij["wachtwoord"], $rij["familienaam"], $rij["voornaam"], $adres->getById($rij["adresId"]), $rij["telefoonnummer"], (bool)$rij["promo"], $rij["opmerking"]);


        } catch (\PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }
        return null;
    }

    public function updateKlant(Klant $klant)
    {
        try {
            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $stmt = $dbh->prepare("update klanten SET email = :email, familienaam = :familienaam, voornaam = :voornaam, 
                   telefoonnummer = :telefoonnummer, opmerking = :opmerking where klantId = :klantId");
            $stmt->bindValue(":klantId", $klant->getKlantId());
            $stmt->bindValue(":email", $klant->getEmail());
            $stmt->bindValue(":familienaam", $klant->getFamilienaam());
            $stmt->bindValue(":voornaam", $klant->getVoornaam());
            $stmt->bindValue(":telefoonnummer", $klant->getTelefoonnummer());
            $stmt->bindValue(":opmerking", $klant->getOpmerking());

            $stmt->execute();
            $dbh = null;


        } catch (\PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }
        return null;
    }
}