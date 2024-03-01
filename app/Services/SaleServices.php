<?php

namespace App\Services;

use App\Repositories\Contracts\SaleRepositoryInterface;

class SaleServices
{
    public function __construct(protected SaleRepositoryInterface $saleRepositoryInterface)
    {}

    public function fetchAllSales()
    {
        return $this->saleRepositoryInterface->fetchAllSales();
    }

}
