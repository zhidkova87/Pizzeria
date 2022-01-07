<?php
declare(strict_types=1);

namespace Business;

use Data\ProductDAO;
use Entities\Product;


class ProductService {

    private ProductDAO $productDAO;

    public function __construct()
    {
        $this->productDAO = new ProductDAO();
    }

    public function haalProductOp(int $productId): ?Product
    {
        return $this->productDAO->getById($productId);
    }
    public function getAllProducten(): ?array
    {
        return $this->productDAO->getAll();
    }
}
