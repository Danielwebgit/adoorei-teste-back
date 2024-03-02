<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaleFormRequest;
use App\Http\Resources\SaleResource;
use App\Models\Sale;
use App\Services\SaleItemService;
use App\Services\SaleServices;
use Illuminate\Http\Request;

class SalesController extends Controller
{

    public function __construct(
            protected SaleServices $saleServices,
            protected SaleItemService $saleItemService
        )
    {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = $this->saleServices->fetchAllSales();
        return SaleResource::collection($response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaleFormRequest $request)
    {
        $salesData = $this->saleServices->storeSale($request->input());
        $this->saleItemService->storeSaleItems($salesData['data_sales'], $salesData['sale_id']);

        return response()->json([ 'msg' => Sale::MSG_SALE_MADE]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->saleServices->findSaleById($id);
    }

    public function cancelSale(string $id)
    {
        return $this->saleServices->cancelSale($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
