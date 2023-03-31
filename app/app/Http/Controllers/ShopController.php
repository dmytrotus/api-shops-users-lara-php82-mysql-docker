<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Http\Requests\ShopRequest;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data' => Shop::all()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShopRequest $request)
    {
        $shop = Shop::create([
            'name' => $request->name,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return response()->json([
            'data' =>  $shop
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $shop = Shop::findOrFail($id);

        return response()->json([
            'data' =>  $shop,
            'weather' => $shop->weather()
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShopRequest $request, string $id)
    {
        $shop = Shop::findOrFail($id);
        $shop->update([
            'name' => $request->name,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return response()->json([
            'message' => __('app.shop_updated'),
            'data' =>  $shop
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Shop::findOrFail($id)->delete();

        ///can be used 204 code as well
        return response()->json([
            'message' => __('app.shop_deleted'),
        ], 200);
    }

    public function showProducts(string $id)
    {
        $products = Shop::findOrFail($id)->products;

        return response()->json([
            'data' =>  $products
        ], 200);
    }
}
