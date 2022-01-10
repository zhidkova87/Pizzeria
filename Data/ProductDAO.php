<?php
declare(strict_types=1);

namespace Data;

use PDO;
use Data\DBConfig;
use Entities\Product;

class ProductDAO {

    public function getAll(): ?array
    {
        $lijst = array();
        try {
            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $stmt = $dbh->prepare("select * from producten");
            $stmt->execute();
            $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultSet as $rij) {
                if($rij) {
                    $product = $this->createProduct($rij);
                    array_push($lijst, $product);
                }
            }
            $dbh = null;
            return $lijst;

        } catch (\PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }
        return null;
    }

    public function getById($productId) : ?Product
    {
        try {
            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $stmt = $dbh->prepare("select * from producten where productId = :productId");
            $stmt->bindValue(":productId", $productId);
            $stmt->execute();
            $rij = $stmt->fetch(PDO::FETCH_ASSOC);
            $dbh = null;
            return $this->createProduct($rij);

            }  catch (\PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }
        return null;
        }

        public function createProduct($rij): ?Product
        {
            return new Product((int) $rij["productId"], $rij["naam"], (float) $rij["prijs"], $rij["omschrijving"], (float)$rij["promoprijs"], (bool)$rij["beschikbaar"], $rij["foto"]);
        }
}