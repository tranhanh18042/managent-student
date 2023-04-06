<?php

namespace App\Http\Controllers;

use App\Http\Resources\UpdateUser;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getListUsers(){
        return UserResource::collection(User::all());
    }
    public function getUserByID(int $id){
        return new UserResource(User::findOrFail($id));
    }
    public function updateUserByID(Request $request, int $id){
        $userRes = User::where('id', $id)->update($request->all());
        return $userRes;
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
