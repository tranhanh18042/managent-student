<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

    public function updateUser(Request $request){
        $user = Auth::user();
        if($request->has('avatar')){
            $file = $request->file('avatar');
            $name = time().'-'.$user->id.'-'.'avatar.'.$file->getClientOriginalExtension();
            Storage::put($name,file_get_contents($file));
            $input = $request->all(['avatar']);
            $input['avatar'] = Storage::url($name);
            dd($input['avatar']);
            DB::table('users')
                ->where('email', $user->email)
                ->update($input);
        }else{
            $input = $request->all(['name', 'email','phone', 'address']);
            DB::table('users')
            ->where('email', $user->email)
            ->update($input);
        }
  
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
