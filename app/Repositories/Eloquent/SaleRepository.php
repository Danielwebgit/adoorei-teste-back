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
        return $this->model->with('items')->where('sale_id', $saleId)->get();
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

    public function cancelSale($saleId): bool
    {
        $cancelSale = $this->model->where('sale_id', $saleId)->update(['status' => Sale::STATUS_CANCELED_SALE]);

        if ($cancelSale === 0) {
            throw new \Exception(Sale::MSG_SALE_NOT_FOUND);
        }

        return $cancelSale;
    }
}
