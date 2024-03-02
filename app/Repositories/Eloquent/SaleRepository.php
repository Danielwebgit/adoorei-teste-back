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
        return $this->model->with('items')->get();
    }

    public function findSaleById($saleId)
    {
        return $this->model->find($saleId);
    }

    public function storeSale(int $totalAmount, float $calculePriceTotal, string $statusApprovedSale)
    {
        $sale = [
            'amount' => $totalAmount,
            'price_total' => $calculePriceTotal,
            'status' => $statusApprovedSale
        ];
        return $this->model->create($sale);
    }
}
