<?php

namespace App\Repositories\Eloquent;

use App\Models\Sale;
use App\Repositories\Contracts\SaleRepositoryInterface;

class SaleRepository implements SaleRepositoryInterface
{

    public function __construct(
        private Sale $model
    ){}

    public function fetchAllSales()
    {
        return $this->model->all();
    }

    public function findSaleById($saleId)
    {

    }
}
