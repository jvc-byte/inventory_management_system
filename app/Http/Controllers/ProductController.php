<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Units;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use LDAP\Result;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('warehouse.add_product');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('warehouse.add_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->only('name'), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $code = rand(000000, 999999);
        $product = new Products();
        $product->name = $request->input('name');
        $product->code = $code;
        // Assign other fields if applicable

        $product->save();

        return redirect('warehouse/view_product')->with('success', 'Product Added successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show()
    {
        $product = Products::where('status', 1)->get();
        return view('warehouse.view_product', ['product' => $product,]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Products::where('status', 1)->where('id', $id)->first();

        return view('warehouse.edit_product', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the customer by ID
        $product = Products::find($id);

        // Check if the customer is found
        if (!$product) {
            return redirect('/warehouse/view_product')->with('error', 'Product not found');
        }

        // Update customer details
        $product->name = $request->input('name');
        $product->save();
        return redirect('/warehouse/view_product')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the customer by ID
        $product = Products::find($id);

        // Delete the customer
        $product->delete();

        return redirect('warehouse/view_product')->with('success', 'Product deleted successfully');
    }

    public function searchProduct(Request $request)
    {
        $searchs = [];
        return view('warehouse.search_product', ['searchs' => $searchs]);
    }

    public function searchProductResult(Request $request)
    {
        $searchs = [];
        $searchs = Products::where('code', 'like', '%' . $request['name'] . '%')
            ->orwhere('name', 'like', '%' . $request['name'] . '%')->get();

        return view('warehouse.search_product', ['searchs' => $searchs]);
    }

    public function productReceive(string $id)
    {
        $units = Units::all();
        $product = Products::where('id', $id)->first();
        return view('warehouse.receive_product', ['product' => $product, 'units' => $units]);
    }
}
