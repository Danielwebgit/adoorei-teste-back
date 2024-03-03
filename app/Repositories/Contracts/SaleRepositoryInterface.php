<?php

namespace App\Repositories\Contracts;

interface SaleRepositoryInterface
{
    public function fetchAllSales();
    public function findSaleById(int $saleId);
    public function storeSale(int $totalAmount, float $calculePriceTotal, string $statusApprovedSale);
    public function cancelSale(int $saleId);
    public function updateSale(int $saleId, array $data);
}
