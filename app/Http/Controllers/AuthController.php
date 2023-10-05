<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register_form()
    {
        return view('auth.register');
    }

    public function login_form()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        // Validate the registration request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user
        $user = User::create([
            'name' => $request->name,
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
                // Cookie Session Authentication
                return redirect('/');
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
