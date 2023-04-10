<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showloginErr(){
        return view('login');
    }
    public function login(Request $request){

        $user = User::whereEmail($request->email)->wherePassword(md5($request->password))->first();
        if ($user != null) {
            return redirect()->route('listUsers');
        }
        else {
            return redirect()->back();
        }
    }
}
