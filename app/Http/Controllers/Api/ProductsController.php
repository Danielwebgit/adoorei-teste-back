<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Services\ProductServices;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function __construct(protected ProductServices $productServices)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = $this->productServices->fetchAllProducts();
        return ProductResource::collection($response);
    }
}
