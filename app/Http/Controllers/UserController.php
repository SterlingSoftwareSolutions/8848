<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->wantsJson()){
            return response()->json([
                'success' => true,
                'users' => User::all()
            ]); 
        }

        return view('admin.users.index', [
            'users' => User::where('role', 'client_retail')->orWhere('role', 'client_wholesale')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'phone' => 'required|string|unique:users,phone',
            'role' => 'required',
            'password' => 'required|confirmed',

            'billing_first_name' => 'required',
            'billing_last_name' => 'required',
            'billing_company' => 'required',
            'billing_address_line_1' => 'required',
            'billing_address_line_2' => 'required',
            'billing_city' => 'required',
            'billing_zip' => 'required',
            'billing_state' => 'required',
            'billing_phone' => 'required',

            'shipping_first_name' => 'required',
            'shipping_last_name' => 'required',
            'shipping_company' => 'required',
            'shipping_address_line_1' => 'required',
            'shipping_address_line_2' => 'required',
            'shipping_city' => 'required',
            'shipping_zip' => 'required',
            'shipping_state' => 'required',
            'shipping_phone' => 'required'
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'password' => Hash::make($request->password)
        ]);

        // Billing Address
        $billing_address_data = [
            'user_id' => $user->id,
            'type' => 'billing',
            'first_name' => $request->billing_first_name,
            'last_name' => $request->billing_last_name,
            'company' => $request->billing_company,
            'address_line_1' => $request->billing_address_line_1,
            'address_line_2' => $request->billing_address_line_2,
            'city' => $request->billing_city,
            'zip' => $request->billing_zip,
            'state' => $request->billing_state,
            'phone' => $request->billing_phone,
        ];

        if($user->address_billing){
            $user->address_billing->update($billing_address_data);
        } else{
            Address::create($billing_address_data);
        }

        // Shipping Address
        $shipping_address_data = [
            'user_id' => $user->id,
            'type' => 'shipping',
            'first_name' => $request->shipping_first_name,
            'last_name' => $request->shipping_last_name,
            'company' => $request->shipping_company,
            'address_line_1' => $request->shipping_address_line_1,
            'address_line_2' => $request->shipping_address_line_2,
            'city' => $request->shipping_city,
            'zip' => $request->shipping_zip,
            'state' => $request->shipping_state,
            'phone' => $request->shipping_phone,
        ];

        if($user->address_shipping != null){
            $user->address_shipping->update($shipping_address_data);
        } else{
            Address::create($shipping_address_data);
        }

        if($request->wantsJson()){
            return response()->json([
                'success' => true,
                'user' => $user
            ]);
        }
   
        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, User $user)
    {
        if($request->wantsJson()){
        return response()->json([
          'success' => true,
          'user' => $user
        ]);
        }

        return view('admin.users.create-edit',[
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.create-edit',[
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if($request->password){
            $request->validate([
                'password' => 'required|string|min:8|confirmed',
            ]);

            $user->forceFill([
                'password' => Hash::make($request->password)
            ])->save();
        }

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|string|email|unique:users,email,' . $user->id,
            'phone' => 'required|string|unique:users,phone,' . $user->id,

            'billing_first_name' => 'required',
            'billing_last_name' => 'required',
            'billing_company' => 'required',
            'billing_address_line_1' => 'required',
            'billing_address_line_2' => 'required',
            'billing_city' => 'required',
            'billing_zip' => 'required',
            'billing_state' => 'required',
            'billing_phone' => 'required',

            'shipping_first_name' => 'required',
            'shipping_last_name' => 'required',
            'shipping_company' => 'required',
            'shipping_address_line_1' => 'required',
            'shipping_address_line_2' => 'required',
            'shipping_city' => 'required',
            'shipping_zip' => 'required',
            'shipping_state' => 'required',
            'shipping_phone' => 'required'
        ]);

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        // Billing Address
        $billing_address_data = [
            'user_id' => $user->id,
            'type' => 'billing',
            'first_name' => $request->billing_first_name,
            'last_name' => $request->billing_last_name,
            'company' => $request->billing_company,
            'address_line_1' => $request->billing_address_line_1,
            'address_line_2' => $request->billing_address_line_2,
            'city' => $request->billing_city,
            'zip' => $request->billing_zip,
            'state' => $request->billing_state,
            'phone' => $request->billing_phone,
        ];

        if($user->address_billing){
            $user->address_billing->update($billing_address_data);
        } else{
            Address::create($billing_address_data);
        }

        // Shipping Address
        $shipping_address_data = [
            'user_id' => $user->id,
            'type' => 'shipping',
            'first_name' => $request->shipping_first_name,
            'last_name' => $request->shipping_last_name,
            'company' => $request->shipping_company,
            'address_line_1' => $request->shipping_address_line_1,
            'address_line_2' => $request->shipping_address_line_2,
            'city' => $request->shipping_city,
            'zip' => $request->shipping_zip,
            'state' => $request->shipping_state,
            'phone' => $request->shipping_phone,
        ];

        if($user->address_shipping != null){
            $user->address_shipping->update($shipping_address_data);
        } else{
            Address::create($shipping_address_data);
        }

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'user' => $user->load(['address_shipping', 'address_billing']),
            ], 200);
        } else {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,User $user)
    {
        $user->delete();

        if($request->wantsJson()){
            return response()->json([
                'success' => true
            ]);
        }

        return redirect('/admin/users');
    }
}
