<?php

namespace Tests\Feature;

use App\Factories\SaleServicesFactory;
use App\Services\SaleServices;
use Tests\TestCase;

class SaleServiceTest extends TestCase
{
    protected function createSaleServices(): SaleServices
    {
        return SaleServicesFactory::create();
    }

    public function testCalculatePrice(): void
    {
        $saleServices = $this->createSaleServices();

        $result = $saleServices->calculatePrice(2, 25);
        $this->assertEquals(50, $result);
    }
}
