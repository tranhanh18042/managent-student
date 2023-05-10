<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * @Handle an incoming request show list students
     * @return view('listUsers')
     */
    public function getListUsers()
    {
        $users = User::where('role', 0)->get();
        return view('listUsers', compact('users'));
    }

    /**
     * @Handle an incoming request Show profile user
     * @return view('profileUser')
     */
    public function getUserByID()
    {
        $userRes = Auth::user();
        return view('profileUser', compact('userRes'));
    }

    /**
     * @Handle an incoming request update profile user
     * @param  \Illuminate\Requests\UserRequest  $request
     * @return redirect()->route('profile')
     */
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
    public function edit()
    {
        $user = Auth::user();
        return view('updateProfile', compact('user'));
    }
}
