<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|max:255|email',
                'AspiringJob' => 'nullable|string|max:255',
                'password' => 'required|string|confirmed|min:8',
            ]
        );
        
        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'AspiringJob'=>$request->AspiringJob,
                'password' => Hash::make($request->password),
            ]
        );
        Auth::login($user);
        return view("home", compact('user'))->with('message', $request->name.'さんを登録しました');
    }
}
