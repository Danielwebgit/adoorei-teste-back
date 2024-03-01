<?php

namespace App\Repositories\Contracts;

interface SaleRepositoryInterface
{
    public function fetchAllSales();
    public function findSaleById($saleId);
}
