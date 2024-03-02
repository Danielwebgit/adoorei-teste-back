<?php

namespace App\Repositories\Contracts;

interface ProductRepositoryInterface
{
    public function fetchAllProducts();
    public function findProductById(int $productId);
    public function searchForProductsByIds($productIds);
}
