<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function frontLogin()
    {
    	return view('frontend.auth.login');
    }

    public function frontAuthenticate(Request $request)
    {
    	$credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
        	return redirect()->route('front.home');
        } else {
        	return view('frontend.auth.login', [
                'error' => 'Login or password was incorrect',
                'email' => $request->email,
            ]);
        }
    }
}
