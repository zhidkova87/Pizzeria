<?php
declare(strict_types=1);

namespace Entities;

class Plaats {
    private int $plaatsId;
    private string $postcode;
    private string $gemeente;

    /**
     * @param int $plaatsId
     * @param string $postcode
     * @param string $gemeente
     */
    public function __construct(int $plaatsId, string $postcode, string $gemeente)
    {
        $this->plaatsId = $plaatsId;
        $this->postcode = $postcode;
        $this->gemeente = $gemeente;
    }

    /**
     * @return int
     */
    public function getPlaatsId(): int
    {
        return $this->plaatsId;
    }

    /**
     * @param int $plaatsId
     */
    public function setPlaatsId(int $plaatsId): void
    {
        $this->plaatsId = $plaatsId;
    }

    /**
     * @return string
     */
    public function getPostcode(): string
    {
        return $this->postcode;
    }

    /**
     * @param string $postcode
     */
    public function setPostcode(string $postcode): void
    {
        $this->postcode = $postcode;
    }

    /**
     * @return string
     */
    public function getGemeente(): string
    {
        return $this->gemeente;
    }

    /**
     * @param string $gemeente
     */
    public function setGemeente(string $gemeente): void
    {
        $this->gemeente = $gemeente;
    }



}