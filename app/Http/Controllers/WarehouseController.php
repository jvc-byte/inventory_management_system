<?php

namespace App\Http\Controllers;

use App\Models\ProductWareHouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WarehouseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('warehouse.home');

    }

    public function show() {
        $warehouse_products = ProductWareHouse::where('status', 1)->get();
        return view('warehouse.view_warehouse_product', ['warehouse_products' => $warehouse_products,]);
    }

    public function storeOrUpdate(Request $request, string $id)
    {
        
        $warehouse_products = ProductWareHouse::updateOrInsert(
            ['product_id' => $id], // Use the id from the URL as the product_id
            [
                'code' => $request->input('code'),
                'quantity' => $request->input('quantity'),
                'unit' => $request->input('unit'),
                'price' => $request->input('price'),
                'expiry_date' => $request->input('expiry_date'),
            ]
        );

        return view('warehouse.view_warehouse_product', [
            'warehouse_products' => $warehouse_products,
        ]);
    }

    public function showWarehouse() {
        $warehouse_products = ProductWareHouse::where('status', 1)->get();
        return view('warehouse.view_warehouse_product', ['warehouse_products' => $warehouse_products,]);
    }
}
