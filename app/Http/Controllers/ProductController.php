<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('product')) {
            $products = Product::where('name', 'like', '%' . $request->input('product') . '%')->get();
            $searchWord = $request->input('product');
        } else {
            $products = Product::all();
            $searchWord = '';
        }

        return Inertia::render('Catalogue', [
            'products' => $products,
            'searchWord' => $searchWord
        ]);
    }

    public function orderProducts(Request $request)
    {
        $order = Order::create([
            'status' => 'To Ship',
            'total_price' => $request->totalPrice
        ]);

        foreach ($request->cart as $product) {
            $order->products()->attach(
                $product['id'],
                [
                    'quantity' => $product['quantity']
                ]
            );
        }

        return to_route('order.show', [$order->id]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
