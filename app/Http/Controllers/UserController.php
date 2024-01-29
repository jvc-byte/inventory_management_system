<?php

namespace App\Http\Controllers;

use \App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('manager.register_user');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return view('warehouse.add_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => ['required', 'email'],
            'user_type' => 'required',
            'password' => Hash::make('password'),
        ]);

        $users = new User();
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->user_type = $request->input('user_type');
        $users->password = $request->input('password');
        $users->save();

        return redirect('register_user')->with('success', "User {$users->name} registered successfully");
    }


    /**
     * Display the specified resource.
     */
    public function show()
    {
        $users = User::where('status', 1)->get();
        return view('manager.view_users', ['users' => $users,]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::where('status', 1)->where('id', $id)->first();

        return view('manager.edit_user', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the customer by ID
        $user = User::find($id);

        // Check if the customer is found
        if (!$user) {
            return redirect('view_users')->with('error', 'User not found');
        }

        // Update customer details
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        return redirect('view_users')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the customer by ID
        $user = User::find($id);

        // Delete the customer
        $user->delete();

        return redirect('/view_users')->with('success', 'User deleted successfully');
    }
}
