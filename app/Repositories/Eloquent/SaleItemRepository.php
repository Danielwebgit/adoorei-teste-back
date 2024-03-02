<?php

namespace App\Repositories\Eloquent;

use App\Models\SaleItem;
use App\Repositories\Contracts\SaleItemRepositoryInterface;

class SaleItemRepository implements SaleItemRepositoryInterface
{
    public function __construct(
        private SaleItem $model
    ){}

    public function storeSaleItems($dataSales)
    {
        return $this->model->insert($dataSales);
    }
}
