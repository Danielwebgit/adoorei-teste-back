<?php

namespace App\Factories;

use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\SaleItemRepositoryInterface;
use App\Services\SaleServices;
use App\Repositories\Contracts\SaleRepositoryInterface;

class SaleServicesFactory
{
    public static function create(): SaleServices
    {
        $saleRepositoryMock = app(SaleRepositoryInterface::class);
        $saleItemRepositoryMock = app(SaleItemRepositoryInterface::class);
        $productRepositoryMock = app(ProductRepositoryInterface::class);
        return new SaleServices($saleRepositoryMock, $productRepositoryMock, $saleItemRepositoryMock);
    }
}
