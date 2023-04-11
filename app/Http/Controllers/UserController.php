<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getListUsers(){
        $users = UserResource::collection(User::all());
        return view('listUsers', ['users' => $users]);
    }
    public function getUserByID(){
        $userRes = Auth::user();
        return view('profileUser', compact('userRes'));
    }
    public function edit(){
        $user = Auth::user();
        return view('updateProfile', compact('user'));
    }

    public function updateUser(UserRequest $request){
        $user = Auth::user();
        $input = $request->safe()->only(['name', 'email','phone', 'address']);
        DB::table('users')
            ->where('email', $user->email)
            ->update($input);  
        return redirect()->route('profile');
    }
    public function createUser(Request $request){
        $user = User::create([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'avatar' => $request->avatar,
            'role' => $request->role,

        ]);
        return $user;
        
    }
}
