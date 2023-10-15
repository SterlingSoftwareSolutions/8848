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
        $query = User::query();

        if($request->role){
            $query->where('role', $request->role);
        } else{
            $query->whereIn('role', ['client_retail', 'client_wholesale']);
        }

        if($request->priority){
            $query->where('priority', $request->priority);
        }

        if($request->search){
            $query->where('first_name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('last_name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('email', 'LIKE', '%' . $request->search . '%')
                ->orWhere('phone', 'LIKE', '%' . $request->search . '%');
        }

        if($request->wantsJson()){
            return response()->json([
                'success' => true,
                'users' => User::all()
            ]); 
        }

        return view('admin.users.index', [
            'users' => $query->paginate(10)
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
            'priority' => 'required',
            'password' => 'required|confirmed',

            'billing_first_name' => 'nullable|string',
            'billing_last_name' => 'nullable|string',
            'billing_company' => 'nullable|string',
            'billing_address_line_1' => 'nullable|string',
            'billing_address_line_2' => 'nullable|string',
            'billing_city' => 'nullable|string',
            'billing_zip' => 'nullable|string',
            'billing_state' => 'nullable|string',
            'billing_phone' => 'nullable|string|min:10',

            'shipping_first_name' => 'nullable|string',
            'shipping_last_name' => 'nullable|string',
            'shipping_company' => 'nullable|string',
            'shipping_address_line_1' => 'nullable|string',
            'shipping_address_line_2' => 'nullable|string',
            'shipping_city' => 'nullable|string',
            'shipping_zip' => 'nullable|string',
            'shipping_state' => 'nullable|string',
            'shipping_phone' => 'nullable|string|min:10'
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'priority' => $request->priority,
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
            'phone' => 'nullable|string|unique:users,phone,' . $user->id,
            'role' => 'required',
            'priority' => 'required',

            'billing_first_name' => 'nullable|string',
            'billing_last_name' => 'nullable|string',
            'billing_company' => 'nullable|string',
            'billing_address_line_1' => 'nullable|string',
            'billing_address_line_2' => 'nullable|string',
            'billing_city' => 'nullable|string',
            'billing_zip' => 'nullable|string',
            'billing_state' => 'nullable|string',
            'billing_phone' => 'nullable|string|min:10',

            'shipping_first_name' => 'nullable|string',
            'shipping_last_name' => 'nullable|string',
            'shipping_company' => 'nullable|string',
            'shipping_address_line_1' => 'nullable|string',
            'shipping_address_line_2' => 'nullable|string',
            'shipping_city' => 'nullable|string',
            'shipping_zip' => 'nullable|string',
            'shipping_state' => 'nullable|string',
            'shipping_phone' => 'nullable|string|min:10'
        ]);

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'priority' => $request->priority,
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
            return redirect('/admin/users');
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
