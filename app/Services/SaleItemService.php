<?php

namespace App\Services;

use App\Repositories\Contracts\SaleItemRepositoryInterface;
use Exception;

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

    public function updateSaleItems(array $dataSaleItems, int $saleId)
    {
        $addNewItems = [];

        try {

            foreach ($dataSaleItems as $saleItem) {

                $saleItemUpdate = $this->saleItemRepositoryInterface->updateSaleItems($saleItem, $saleId);

                if (! $saleItemUpdate) {
                    $addNewItems[] = array_merge($saleItem, ['sale_id' => $saleId]);
                }
            }

            $this->saleItemRepositoryInterface->storeSaleItems($addNewItems);

        } catch(Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }

    }

    public function addMergeItems(array $dataSaleItems, int $saleId)
    {
        $addItems = [ 'sale_id' => $saleId, "created_at" => now(), "updated_at" => now() ];
        $dataSales = array_map(fn($saleItem) => array_merge($saleItem, $addItems), $dataSaleItems);

        return $dataSales;
    }
}
