<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('register_customer');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register_customer');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => ['required', 'email'],
            'address' => 'required',
            'phone_number' => ['required', 'unique:customers']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->address = $request->input('address');
        $customer->phone_number = $request->input('phone_number');
        $customer->save();

        return redirect('/view_customer')->with('success', 'Customer Added successfully');
    }



    /**
     * Display the specified resource.
     */
    public function show()
    {
        $customers = Customer::where('status', 1)->get();
        return view('view_customer', ['customers' => $customers,]);
        // return view('view_customer') -> with ('customers', $customers);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::where('status', 1)->where('id', $id)->first();

        return view('edit_customer', [
            'customer' => $customer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the customer by ID
        $customers = Customer::find($id);

        // Check if the customer is found
        if (!$customers) {
            return redirect('view_customer')->with('error', 'Customer not found');
        }

        // Update customer details
        $customers->name = $request->input('name');
        $customers->email = $request->input('email');
        $customers->address = $request->input('address');
        $customers->phone_number = $request->input('phone_number');
        $customers->save();
        return redirect('view_customer')->with('success', 'Customer updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the customer by ID
        $customer = Customer::find($id);

        // Delete the customer
        $customer->delete();

        return redirect('/view_customer')->with('success', 'Customer deleted successfully');
    }
}
