<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaleFormRequest;
use App\Http\Resources\SaleResource;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Services\SaleItemService;
use App\Services\SaleServices;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function updateSale(SaleFormRequest $request, string $saleId)
    {
        try {

            return DB::transaction(function () use ($request, $saleId) {

                $salesData = $this->saleServices->updateSale($request->input(), $saleId);

                $this->saleItemService->updateSaleItems($salesData['data_sales'], $saleId);

                return response()->json(['smg' => SaleItem::MSG_ADD_NEW_ITEMS]);

            });

        } catch (Exception $e) {
                return response()->json(['smg' => $e->getMessage()]);
            }
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
