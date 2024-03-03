<?php

namespace App\Repositories\Contracts;

interface SaleItemRepositoryInterface
{
    public function storeSaleItems(array $dataSales);
    public function updateSaleItems(array $dataSales, $saleId);
    public function findSaleByProductId(int $productId, int $saleId);
}
