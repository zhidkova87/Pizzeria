<?php
declare(strict_types=1);

namespace Entities;

class Product {
    private int $productId;
    private string $naam;
    private float $prijs;
    private string $omschrijving;
    private float $promoprijs;
    private bool $beschikbaar;
    private string $foto;

    /**
     * @param int $productId
     * @param string $naam
     * @param float $prijs
     * @param string $omschrijving
     * @param float $promoprijs
     * @param bool $beschikbaar
     * @param string $foto
     */
    public function __construct(int $productId, string $naam, float $prijs, string $omschrijving, float $promoprijs, bool $beschikbaar, string $foto)
    {
        $this->productId = $productId;
        $this->naam = $naam;
        $this->prijs = $prijs;
        $this->omschrijving = $omschrijving;
        $this->promoprijs = $promoprijs;
        $this->beschikbaar = $beschikbaar;
        $this->foto = $foto;
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     */
    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    /**
     * @return string
     */
    public function getNaam(): string
    {
        return $this->naam;
    }

    /**
     * @param string $naam
     */
    public function setNaam(string $naam): void
    {
        $this->naam = $naam;
    }

    /**
     * @return float
     */
    public function getPrijs(): float
    {
        return $this->prijs;
    }

    /**
     * @param float $prijs
     */
    public function setPrijs(float $prijs): void
    {
        $this->prijs = $prijs;
    }

    /**
     * @return string
     */
    public function getOmschrijving(): string
    {
        return $this->omschrijving;
    }

    /**
     * @param string $omschrijving
     */
    public function setOmschrijving(string $omschrijving): void
    {
        $this->omschrijving = $omschrijving;
    }

    /**
     * @return float
     */
    public function getPromoprijs(): float
    {
        return $this->promoprijs;
    }

    /**
     * @param float $promoprijs
     */
    public function setPromoprijs(float $promoprijs): void
    {
        $this->promoprijs = $promoprijs;
    }

    /**
     * @return bool
     */
    public function isBeschikbaar(): bool
    {
        return $this->beschikbaar;
    }

    /**
     * @param bool $beschikbaar
     */
    public function setBeschikbaar(bool $beschikbaar): void
    {
        $this->beschikbaar = $beschikbaar;
    }

    /**
     * @return string
     */
    public function getFoto(): string
    {
        return $this->foto;
    }

    /**
     * @param string $foto
     */
    public function setFoto(string $foto): void
    {
        $this->foto = $foto;
    }



}