<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function getListUsers()
    {
        $users = User::where('role', 0)->get();
        return view('listUsers', compact('users'));
    }
    public function getUserByID()
    {
        $userRes = Auth::user();
        // dd($userRes);
        return view('profileUser', compact('userRes'));
    }
    public function edit()
    {
        $user = Auth::user();
        return view('updateProfile', compact('user'));
    }

    public function updateUser(UserRequest $request)
    {
        $user = Auth::user();
        if ($request->has('avatar')) {
            $file = $request->file('avatar');
            $name = time() . '-' . $user->id . '-' . 'avatar.' . $file->getClientOriginalExtension();
            Storage::put($name, file_get_contents($file));
            $url = Storage::url($name);
            User::where('id', $user->id)
                ->update([
                    'name' => $request->name,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'avatar' => $url
                ]);
        } else {
            User::where('id', $user->id)
                ->update([
                    'name' => $request->name,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'email' => $request->email
                ]);
        }

        return redirect()->route('profile');
    }
    public function createUser(Request $request)
    {
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
