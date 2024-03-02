<?php

namespace App\Services;

use App\Repositories\Contracts\SaleItemRepositoryInterface;

class SaleItemService
{
    public function __construct(
            protected SaleItemRepositoryInterface $saleItemRepositoryInterface
        )
    {}

    public function storeSaleItems(array $dataSaleItems, int $saleId)
    {
        $dataSales = $this->addMergeItems($dataSaleItems, $saleId);
        $this->saleItemRepositoryInterface->storeSaleItems($dataSales);
    }

    public function addMergeItems(array $dataSaleItems, int $saleId)
    {
        $addItems = [ 'sale_id' => $saleId, "created_at" => now(), "updated_at" => now() ];
        $dataSales = array_map(fn($saleItem) => array_merge($saleItem, $addItems), $dataSaleItems);

        return $dataSales;
    }
}
