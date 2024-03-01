<?php

namespace App\Services;

use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductServices
{
    public function __construct(protected ProductRepositoryInterface $productRepositoryInterface)
    {}

    public function fetchAllProducts()
    {
        return $this->productRepositoryInterface->fetchAllProducts();
    }
}
