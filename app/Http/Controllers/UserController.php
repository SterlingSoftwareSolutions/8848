<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'users' => User::all()
        ]);
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
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required|confirmed'
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password)
        ]);

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

     return view('admin.users.show',[
        'user' => $user
     ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        $user ->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'role' => $request->role,
        ]);


        if($request->wantsJson()){
            return response()->json([
                'success' => true,
                'user' => $user
            ]);
        }
   
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,User $user)
    {
        $user->delete();

        return response()->json([
            'success' => true, 
        ]);
    }
}
