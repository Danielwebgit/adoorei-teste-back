<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SaleResource;
use App\Services\SaleServices;
use Illuminate\Http\Request;

class SalesController extends Controller
{

    public function __construct(protected SaleServices $saleServices)
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
