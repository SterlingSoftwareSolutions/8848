<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register_form()
    {
        if(!Auth::check()){
            return view('auth.register');
        }
        return redirect()->intended('/');
    }


    public function login_form()
    {
        if(!Auth::check()){
            return view('auth.login');
        }
        return redirect()->intended('/');
    }


    public function logout_form()
    {
        if(Auth::check()){
            return view('auth.logout');
        }
        return redirect()->intended('/');
    }


    public function profile(Request $request)
    {
        $user = $request->user();
        if($request->wantsJson()){
            return response()->json([
                'success' => true,
                'user' => $user,
            ], 200);
        }

        return view('auth.profile', compact('user'));
    }


    public function profile_update(Request $request)
    {
        $user = Auth::user();

        // Changing password?
        if($request->password){
            $request->validate([
                    'current_password' => 'required|string|current_password',
                    'password' => 'required|string|min:8|confirmed',
            ]);

            $request->user()->forceFill([
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
            'billing_address_line_2' => 'nullable',
            'billing_city' => 'required',
            'billing_zip' => 'required',
            'billing_state' => 'required',
            'billing_phone' => 'required',

            'ship_to_billing' => 'required',
            'shipping_first_name' => 'required_if:ship_to_billing,no',
            'shipping_last_name' => 'required_if:ship_to_billing,no',
            'shipping_company' => 'required_if:ship_to_billing,no',
            'shipping_address_line_1' => 'required_if:ship_to_billing,no',
            'shipping_address_line_2' => 'nullable',
            'shipping_city' => 'required_if:ship_to_billing,no',
            'shipping_zip' => 'required_if:ship_to_billing,no',
            'shipping_state' => 'required_if:ship_to_billing,no',
            'shipping_phone' => 'required_if:ship_to_billing,no'
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
        if($request->ship_to_billing == 'no')
        {
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
        } elseif($user->address_shipping){
            $user->address_shipping->delete();
        }

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'user' => $user->load(['address_shipping', 'address_billing']),
            ], 200);
        } else {
            return redirect()->intended('/profile');
        }
    }


    public function register(Request $request)
    {
        // Validate the registration request
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|string|email|unique:users',
            'phone' => 'nullable|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Attempt to log in the new user and create an API token
        if (Auth::attempt($request->only('email', 'password'))) {
            if ($request->wantsJson()) {
                // API Token Authentication
                $user = Auth::user();
                $token = $user->createToken('MyAppToken')->plainTextToken;

                return response()->json([
                    'success' => true,
                    'user' => $user,
                    'token' => $token
                ], 200);
            } else {
                // Cookie Session Authentication
                return redirect('/');
            }

        } else {
            // Authentication failed
            throw ValidationException::withMessages([
                'email' => ['Registration failed.'],
            ]);
        }
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication successful

            if ($request->wantsJson()) {
                // API Token Authentication
                $user = Auth::user();
                $token = $user->createToken('MyAppToken')->plainTextToken;

                return response()->json([
                    'success' => true,
                    'user' => $user,
                    'token' => $token
                ], 200);
            } else {
                $user = Auth::user();
                if($user->role == 'admin' || $user->role == 'superadmin'){
                    return redirect()->intended('/admin');
                }
                // Cookie Session Authentication
                return redirect()->intended('/');
            }
        } else {
            // Authentication failed
            throw ValidationException::withMessages([
                'email' => ['Invalid credentials'],
            ]);
        }
    }


    public function logout(Request $request)
    {
        if ($request->wantsJson()) {
                auth()->user()->tokens()->delete();
                return response()->json([
                'success' => true,
                'message' => "Logged out"
            ], 200);
        } else {
            // Cookie Session Authentication
            Auth::logout();
            return redirect('/');
        }
    }
}
