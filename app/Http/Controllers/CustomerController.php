<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

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
        // dd($request['name']);
        $customer = new Customer();

        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->address = $request['address'];
        $customer->phone_number = $request['phone_number'];
        $customer->save();

        return view('register_customer');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
