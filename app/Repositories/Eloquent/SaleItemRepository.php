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

    public function findSaleByProductId($productId, $saleId)
    {
        return $this->model->where('product_id', $productId)->where('sale_id', $saleId)->get();
    }

    public function updateSaleItems($saleItem, $saleId)
    {
        $item = $this->model->where('product_id', $saleItem['product_id'])->where('sale_id', $saleId)->first();

        if ($item) {

            $item->price += $saleItem['price'];
            $item->amount += $saleItem['amount'];
            return $item->save();
        }

        return null;
    }
}
