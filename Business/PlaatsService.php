<?php
declare(strict_types=1);

namespace Business;

use Data\PlaatsDAO;


class PlaatsService {

    private PlaatsDAO $plaatsDAO;

    public function __construct()
    {
        $this->plaatsDAO = new PlaatsDAO();
    }

    public function toonPostcodesOverzicht(): ?array
    {
        return $this->plaatsDAO->getAll();
    }

}
