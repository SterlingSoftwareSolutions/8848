<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\RedirectResponse;
use App\Notifications\ResetPasswordLink;
use Illuminate\Auth\Events\PasswordReset;

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

    public function forgot_passsword_form()
    {
        if(!Auth::check()){
            return view('auth.forgot-password');
        }
        return redirect()->intended('/');
    }

    public function reset_passsword_form(Request $request)
    {
        if($request->has('email') && $request->has('token'))

        if(!Auth::check()){
            return view('auth.reset-password', [
                'email' => $request->email,
                'token' => $request->token
            ]);
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
                'user' => $user->load(['address_billing', 'address_shipping']),
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

        // Validation rules
        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|string|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|min:10|unique:users,phone,' . $user->id,
            'ship_elsewhere' => 'nullable'
        ];

        $billing_validations = Address::rules('billing_', false);

        if($request->ship_elsewhere){
            $shipping_validations = Address::rules('shipping_', false);
        } else{
            $shipping_validations = [];
        }

        // Validate inputs
        $request->validate(
            array_merge($rules, $billing_validations, $shipping_validations)
        );

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

        if($request->ship_elsewhere){
            if($user->address_shipping != null){
                $user->address_shipping->update($shipping_address_data);
            } else{
                Address::create($shipping_address_data);
            }
        } else{
            $user->address_shipping?->delete();
        }

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'user' => $user->load(['address_shipping', 'address_billing']),
            ], 200);
        } else {
            return redirect('/profile')->withErrors(['success' => 'Profile updated successfully. Now you can shop with us!']);
        }
        
    }


    public function api_user(){
        $user = Auth::user();

        return response()->json([
            'success' => true,
            'user' => $user,
        ], 200);
    }


    public function api_user_update(Request $request){
        $user = Auth::user();

        // Validation rules
        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|string|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|min:10|unique:users,phone,' . $user->id,
        ];

        $password_rules = [
            'current_password' => 'required|string|current_password',
            'password' => 'required|string|min:8|confirmed',
        ];

        if($request->password){
            // Validate inputs
            $request->validate(
                array_merge($rules, $password_rules)
            );

            $request->user()->forceFill([
                'password' => Hash::make($request->password)
            ])->save();

        } else{
            $request->validate($rules);
        }

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return response()->json([
            'success' => true,
            'user' => $user,
        ], 200);
    }


    public function api_addresses(){
        $user = Auth::user();

        return response()->json([
            'success' => true,
            'billing_address' => $user->address_billing,
            'shipping_address' => $user->address_shipping,
        ], 200);
    }


    public function api_addresses_update(Request $request){
        $user = Auth::user();

        // Rules
        $rules = [
            'ship_elsewhere' => 'nullable'
        ];

        $billing_validations = Address::rules('billing_', false);

        if($request->ship_elsewhere){
            $shipping_validations = Address::rules('shipping_', false);
        } else{
            $shipping_validations = [];
        }

        // Validate inputs
        $request->validate(
            array_merge($rules, $billing_validations, $shipping_validations)
        );

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

        if($request->ship_elsewhere){
            if($user->address_shipping != null){
                $user->address_shipping->update($shipping_address_data);
            } else{
                Address::create($shipping_address_data);
            }
        } else{
            $user->address_shipping?->delete();
        }

        $user = $user->fresh();

        return response()->json([
            'success' => true,
            'billing_address' => $user->address_billing,
            'shipping_address' => $user->address_shipping,
        ], 200);
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
                return redirect('/profile')->withErrors(['success' => 'Registration successful, please enter your address details below.']);
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
                return redirect()->intended('/')->withErrors(['success' => 'Login Successful']);
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
            return redirect('/login')->withErrors(['success' => 'Logout successful.']);;
        }
    }

    public function forgot_passsword(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // Generate the token and send the reset link
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Check if the link was sent successfully
        if ($status == Password::RESET_LINK_SENT) {
            // Redirect with the success message
            return back()->withErrors('success', __('Password reset link sent to your email.'));
        }

        return back()->withInput($request->only('email'))
            ->withErrors(['email' => __($status)]);
    }

    public function reset_passsword(Request $request): RedirectResponse
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ]);
     
                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->withErrors('success', __($status))
            : back()->withErrors(['error' => __($status)]);
    }
}
