<?php
declare(strict_types=1);

namespace Entities;

class Adres {
    private int $adresId;
    private string $straat;
    private string $huisnummer;
    private string $bus;
    private Plaats $plaats;

    /**
     * @param int $adresId
     * @param string $straat
     * @param string $huisnummer
     * @param string $bus
     * @param Plaats $plaats
     */
    public function __construct(int $adresId, string $straat, string $huisnummer, string $bus, Plaats $plaats)
    {
        $this->adresId = $adresId;
        $this->straat = $straat;
        $this->huisnummer = $huisnummer;
        $this->bus = $bus;
        $this->plaats = $plaats;
    }

    /**
     * @return int
     */
    public function getAdresId(): int
    {
        return $this->adresId;
    }

    /**
     * @param int $adresId
     */
    public function setAdresId(int $adresId): void
    {
        $this->adresId = $adresId;
    }

    /**
     * @return string
     */
    public function getStraat(): string
    {
        return $this->straat;
    }

    /**
     * @param string $straat
     */
    public function setStraat(string $straat): void
    {
        $this->straat = $straat;
    }

    /**
     * @return string
     */
    public function getHuisnummer(): string
    {
        return $this->huisnummer;
    }

    /**
     * @param string $huisnummer
     */
    public function setHuisnummer(string $huisnummer): void
    {
        $this->huisnummer = $huisnummer;
    }

    /**
     * @return string
     */
    public function getBus(): string
    {
        return $this->bus;
    }

    /**
     * @param string $bus
     */
    public function setBus(string $bus): void
    {
        $this->bus = $bus;
    }

    /**
     * @return Plaats
     */
    public function getPlaats(): Plaats
    {
        return $this->plaats;
    }

    /**
     * @param Plaats $plaats
     */
    public function setPlaats(Plaats $plaats): void
    {
        $this->plaats = $plaats;
    }



}