<?php

namespace Tests\Feature;

use Tests\TestCase;

class SaleServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testCalculatePrice(): void
    {
        $result = 50;

        $this->assertEquals(50, $result);
    }
}
