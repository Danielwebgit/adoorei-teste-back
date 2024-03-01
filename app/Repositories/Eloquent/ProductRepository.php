<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function __construct(
        private Product $model
    ){}

    public function fetchAllProducts()
    {
        return $this->model->all();
    }
}
