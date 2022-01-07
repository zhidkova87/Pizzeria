<?php
declare(strict_types=1);

namespace Entities;

class Bestellijn {
    private int $bestellijnId;
    private Bestelling $bestelling;
    private Product $product;
    private int $aantalBesteld;
    private float $bestelprijs;

    /**
     * @param int $bestellijnId
     * @param Bestelling $bestelling
     * @param Product $product
     * @param int $aantalBesteld
     * @param float $bestelprijs
     */
    public function __construct(int $bestellijnId, Bestelling $bestelling, Product $product, int $aantalBesteld, float $bestelprijs)
    {
        $this->bestellijnId = $bestellijnId;
        $this->bestelling = $bestelling;
        $this->product = $product;
        $this->aantalBesteld = $aantalBesteld;
        $this->bestelprijs = $bestelprijs;
    }

    /**
     * @return int
     */
    public function getBestellijnId(): int
    {
        return $this->bestellijnId;
    }

    /**
     * @param int $bestellijnId
     */
    public function setBestellijnId(int $bestellijnId): void
    {
        $this->bestellijnId = $bestellijnId;
    }

    /**
     * @return Bestelling
     */
    public function getBestelling(): Bestelling
    {
        return $this->bestelling;
    }

    /**
     * @param Bestelling $bestelling
     */
    public function setBestelling(Bestelling $bestelling): void
    {
        $this->bestelling = $bestelling;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    /**
     * @return int
     */
    public function getAantalBesteld(): int
    {
        return $this->aantalBesteld;
    }

    /**
     * @param int $aantalBesteld
     */
    public function setAantalBesteld(int $aantalBesteld): void
    {
        $this->aantalBesteld = $aantalBesteld;
    }

    /**
     * @return float
     */
    public function getBestelprijs(): float
    {
        return $this->bestelprijs;
    }

    /**
     * @param float $bestelprijs
     */
    public function setBestelprijs(float $bestelprijs): void
    {
        $this->bestelprijs = $bestelprijs;
    }



}