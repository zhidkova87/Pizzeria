<?php
declare(strict_types=1);

namespace Data;

use PDO;
use Data\DBConfig;
use Entities\Plaats;

class PlaatsDAO {

    public function getAll(): ?array
    {
        $lijst = array();
        try {
            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $stmt = $dbh->prepare("select * from plaatsen");
            $stmt->execute();
            $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultSet as $rij) {
                if($rij) {
                    $plaats = $this->createPlaats($rij);
                    array_push($lijst, $plaats);
                }
            }
            $dbh = null;
            return $lijst;

        } catch (\PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }
        return null;
    }

    public function getById($plaatsId) : ?Plaats
    {
        try {
            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $stmt = $dbh->prepare("select * from plaatsen where plaatsId = :plaatsId");
            $stmt->bindValue(":plaatsId", $plaatsId);
            $stmt->execute();
            $rij = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $dbh = null;

            return $this->createPlaats($rij);

            }  catch (\PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }
        return null;
    }

    public function createPlaats($rij): Plaats
    {
        return new Plaats((int) $rij["plaatsId"], $rij["postcode"], $rij["gemeente"]);
    }
}