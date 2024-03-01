<?php

namespace App\Repositories\Contracts;

interface SaleRepositoryInterface
{
    public function fetchSale();
    public function findSaleById($saleId);
}
