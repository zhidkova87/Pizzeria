<?php
declare(strict_types=1);

namespace Entities;

class Klant {
    private int $klantId;
    private string $email;
    private string $wachtwoord;
    private string $familienaam;
    private string $voornaam;
    private Adres $adres;
    private string $telefoonnummer;
    private bool $promo;
    private string $opmerking;


    /**
     * @param int $klantId
     * @param string $email
     * @param string $wachtwoord
     * @param string $familienaam
     * @param string $voornaam
     * @param Adres $adres
     * @param bool $promo
     */
    public function __construct(int $klantId, string $email, string $wachtwoord, string $familienaam, string $voornaam, Adres $adres, string $telefoonnummer, bool $promo, string $opmerking)
    {
        $this->klantId = $klantId;
        $this->email = $email;
        $this->wachtwoord = $wachtwoord;
        $this->familienaam = $familienaam;
        $this->voornaam = $voornaam;
        $this->adres = $adres;
        $this->telefoonnummer = $telefoonnummer;
        $this->promo = $promo;
        $this->opmerking = $opmerking;
    }

    /**
     * @return int
     */
    public function getKlantId(): int
    {
        return $this->klantId;
    }

    /**
     * @param int $klantId
     */
    public function setKlantId(int $klantId): void
    {
        $this->klantId = $klantId;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getWachtwoord(): string
    {
        return $this->wachtwoord;
    }

    /**
     * @param string $wachtwoord
     */
    public function setWachtwoord(string $wachtwoord): void
    {
        $this->wachtwoord = $wachtwoord;
    }

    /**
     * @return string
     */
    public function getFamilienaam(): string
    {
        return $this->familienaam;
    }

    /**
     * @param string $familienaam
     */
    public function setFamilienaam(string $familienaam): void
    {
        $this->familienaam = $familienaam;
    }

    /**
     * @return string
     */
    public function getVoornaam(): string
    {
        return $this->voornaam;
    }

    /**
     * @param string $voornaam
     */
    public function setVoornaam(string $voornaam): void
    {
        $this->voornaam = $voornaam;
    }

    /**
     * @return Adres
     */
    public function getAdres(): Adres
    {
        return $this->adres;
    }

    /**
     * @param Adres $adres
     */
    public function setAdres(Adres $adres): void
    {
        $this->adres = $adres;
    }

    /**
     * @return string
     */
    public function getTelefoonnummer(): string
    {
        return $this->telefoonnummer;
    }

    /**
     * @param string $telefoonnummer
     */
    public function setTelefoonnummer(string $telefoonnummer): void
    {
        $this->telefoonnummer = $telefoonnummer;
    }


    /**
     * @return bool
     */
    public function isPromo(): bool
    {
        return $this->promo;
    }

    /**
     * @param bool $promo
     */
    public function setPromo(bool $promo): void
    {
        $this->promo = $promo;
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