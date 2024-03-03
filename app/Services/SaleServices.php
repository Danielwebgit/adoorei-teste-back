<?php

namespace App\Services;

use App\Http\Resources\SaleResource;
use App\Models\Sale;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\SaleItemRepositoryInterface;
use App\Repositories\Contracts\SaleRepositoryInterface;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class SaleServices
{
    public function __construct(
            protected SaleRepositoryInterface $saleRepositoryInterface,
            protected ProductRepositoryInterface $productRepositoryInterface,
            protected SaleItemRepositoryInterface $saleItemRepositoryInterface
        )
    {}

    public function fetchAllSales()
    {
        return $this->saleRepositoryInterface->fetchAllSales();
    }

    public function storeSale($data)
    {
        return DB::transaction(function () use ($data) {

            try {

                $products = $this->productRepositoryInterface->searchForProductsByIds($data['sales']);
                $amountTotalAndPriceTotal = $this->amountTotalAndPriceTotal($products, $data);

                $sale = $this->saleRepositoryInterface->storeSale(
                    $amountTotalAndPriceTotal['total_amount'],
                    $amountTotalAndPriceTotal['calcule_price_total'],
                    Sale::STATUS_APPROVED_SALE
                );

                return [
                    'data_sales' => $amountTotalAndPriceTotal['data_sales'],
                    'sale_id' => $sale->sale_id
                ];

            } catch(Exception $e) {

                return response()->json(['error' => $e->getMessage()], 422);
            }
        });
    }

    public function amountTotalAndPriceTotal($products, $data)
    {
        $dataSales = [];

        foreach($products as $key => $item) {

            $dataSales[] = [
                'price' => $this->calculatePrice($data['sales'][$key]['amount'], $item['price']),
                'amount' => $data['sales'][$key]['amount'],
                'product_id' => $item['product_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }

        $amountsTotal = array_column($dataSales, 'amount');
        $calculePriceTotal = $this->calculePriceTotal($dataSales);
        $totalAmount = array_sum($amountsTotal);

        return [
            'calcule_price_total' => $calculePriceTotal,
            'total_amount' => $totalAmount,
            'data_sales' => $dataSales
        ];
    }

    public function findSaleById($saleId)
    {
        $salesData = $this->saleRepositoryInterface->findSaleById($saleId);
       return SaleResource::collection($salesData);
    }

    public function calculatePrice($quantity, $unitPrice): float
    {
        return $quantity * $unitPrice;
    }

    public function calculePriceTotal($dataSales): float
    {
        $valueTotal = 0;

        foreach ($dataSales as $item) {
            $valueTotal+= $item['price'] * $item['amount'];
        }

        return $valueTotal;
    }

    public function cancelSale($saleId)
    {
        try {

            $this->saleRepositoryInterface->cancelSale($saleId);

            return response()->json(['msg' => Sale::MSG_SALE_CANCELED]);

        } catch(Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404) ;
        }
    }

    public function updateSale($data, $saleId)
    {
        $products = $this->productRepositoryInterface->searchForProductsByIds($data['sales']);
        $amountTotalAndPriceTotal = $this->amountTotalAndPriceTotal($products, $data);

        $data = [
            'amount' => $amountTotalAndPriceTotal['total_amount'],
            'price_total' =>$amountTotalAndPriceTotal['calcule_price_total']
        ];

        $this->saleRepositoryInterface->updateSale($saleId, $data);

        return [
            'data_sales' => $amountTotalAndPriceTotal['data_sales']
        ];
    }
}
