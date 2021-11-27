<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile(){
        return view('user.profile');
    }
    public function profilePassword(){
        return view('user.profile');
    }

    public function profileSave(Request $request){
        $data = $this->validate($request, [
            'first_name' => 'required|string|max:100|regex:/^[A-Za-z]+$/',
            'last_name' => 'required|string|max:100|regex:/^[A-Za-z]+$/',
            'email' => 'required|email|unique:users,email,'.auth::user()->id,
            'phone' => 'nullable|numeric|digits:10|unique:users,phone,'.auth::user()->id,
        ], [
            'first_name.regex' => 'Space, number and special charecters are not allowed.',
            'flast_name.regex' => 'Space, number and special charecters are not allowed.',
        ]);

        User::updateOrCreate(['id' => auth::user()->id], $data);

        return back()->with('success', 'Your profile has been updated successfully.');
    }

    public function PasswordChange(Request $request){
        $this->validate($request, [
            'current_password' => 'required|string|min:8',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $old_pass = $request->input('current_password');

        $user = User::find(auth::user()->id);
        if (Hash::check($old_pass, $user->password)) {

            $password = Hash::make($request->input('password'));
            $user->password = $password;
            $user->save();
            return back()->with('success', 'Your password has been successfully updated.');
        }else{
            return back()->withErrors(array('current_password' => 'Your current password didnot matched.'));
        }

    }
}
