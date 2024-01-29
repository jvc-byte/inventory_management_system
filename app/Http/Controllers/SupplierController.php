<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('warehouse.add_supplier');
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => ['required', 'email'],
            'address' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $supplier = new Supplier();
        $supplier->name = $request->input('name');
        $supplier->address = $request->input('address');
        $supplier->email = $request->input('email');
        $supplier->save();

        return redirect('warehouse/view_supplier')->with('success', 'Supplier Added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $suppliers = Supplier::where('status', 1)->get();
        return view('warehouse.view_supplier', ['supplier' => $suppliers,]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $suppliers = Supplier::where('status', 1)->where('id', $id)->first();

        return view('warehouse.edit_supplier', [ 'supplier' => $suppliers ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Find the supplier by ID
         $suppliers = Supplier::find($id);

         // Check if the supplier is found
         if (!$suppliers) {
             return redirect('view_supplier')->with('error', 'Supplier not found');
         }
 
         // Update supplier details
         $suppliers->name = $request->input('name');
         $suppliers->address = $request->input('address');
         $suppliers->email = $request->input('email');
         $suppliers->save();
         return redirect('warehouse/view_supplier')->with('success', 'Supplier updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the customer by ID
        $suppliers = Supplier::find($id);

        // Delete the customer
        $suppliers->delete();

        return redirect('/warehouse/view_supplier')->with('success', 'Supplier deleted successfully');
    }
}
