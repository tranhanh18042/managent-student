<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('changePassword');
    }
    public function changePassword(ChangePassword $request)
    {
        $input = $request->safe()->only(['current_password', 'new_password', 'confirm_password']);
        $user = Auth::user();
        $checkPass = Hash::check($input['current_password'], $user->password);
        if ($checkPass == true) {
            if ($input['current_password'] != $input['new_password'] && $input['new_password'] == $input['confirm_password']) {
                User::whereId(auth()->user()->id)->update([
                    'password' => Hash::make($input['new_password'])
                ]);
                Auth::logout();
                return redirect()->route('login');
            }
        } else if ($input != null) {
            Session::flash('error', "nhap sai thong tin");
            return redirect()->back();
        }
        Session::flash('error', "Can nhap du thong tin");
        return redirect()->back();
    }
}
