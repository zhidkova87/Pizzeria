<?php
declare(strict_types=1);

namespace  Entities;

use DateTime;

class Bestelling {
    private int $bestelId;
    private Klant $klant;
    private DateTime $bestelmoment;
    private string $opmerking;

    /**
     * @param int $bestelId
     * @param Klant $klant
     * @param DateTime $bestelmoment
     * @param string $opmerking
     */
    public function __construct(int $bestelId, Klant $klant, DateTime $bestelmoment, string $opmerking)
    {
        $this->bestelId = $bestelId;
        $this->klant = $klant;
        $this->bestelmoment = $bestelmoment;
        $this->opmerking = $opmerking;
    }

    /**
     * @return int
     */
    public function getBestelId(): int
    {
        return $this->bestelId;
    }

    /**
     * @param int $bestelId
     */
    public function setBestelId(int $bestelId): void
    {
        $this->bestelId = $bestelId;
    }

    /**
     * @return Klant
     */
    public function getKlant(): Klant
    {
        return $this->klant;
    }

    /**
     * @param Klant $klant
     */
    public function setKlant(Klant $klant): void
    {
        $this->klant = $klant;
    }

    /**
     * @return DateTime
     */
    public function getBestelmoment(): DateTime
    {
        return $this->bestelmoment;
    }

    /**
     * @param DateTime $bestelmoment
     */
    public function setBestelmoment(DateTime $bestelmoment): void
    {
        $this->bestelmoment = $bestelmoment;
    }

    /**
     * @return string
     */
    public function getOpmerking(): string
    {
        return $this->opmerking;
    }

    /**
     * @param string $opmerking
     */
    public function setOpmerking(string $opmerking): void
    {
        $this->opmerking = $opmerking;
    }



}