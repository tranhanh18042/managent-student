<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * @Handle an incoming request page register
     * @return view('register); 
     */
    public function index()
    {
        return view('register');
    }

    /**
     * @Handle an incoming request registration
     * @param  \Illuminate\Requests\RegisterRequest  $request
     * @return redirect->route('login) 
     */
    public function storeRegister(RegisterRequest $request)
    {
        User::create([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        return redirect('login');
    }
}
