<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data' => Product::all()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'ean' => $request->ean,
            'sku' => $request->sku,
            'shop_id' => $request->shop_id
        ]);

        return response()->json([
            'data' =>  $product
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json([
            'data' =>  Product::findOrFail($id)
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->name,
            'ean' => $request->ean,
            'sku' => $request->sku,
            'shop_id' => $request->shop_id
        ]);

        return response()->json([
            'message' => __('app.product_updated'),
            'data' =>  $product
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::findOrFail($id)->delete();

        ///can be used 204 code as well
        return response()->json([
            'message' => __('app.product_deleted'),
        ], 200);
    }
}
