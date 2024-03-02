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

    public function findProductById($productId)
    {
        return $this->model->where('product_id', $productId)->first();
    }

    public function searchForProductsByIds($productIds)
    {
        $productsIds = [];

        foreach($productIds as $item) {
            $productsIds[] = $item['product_id'];
        }

        return $this->model->whereIn('product_id', array_unique($productsIds))->get();
    }
}
