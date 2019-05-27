<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class AuthSupplierController extends Controller
{
    public function supplierRegister()
    {
        return view('backend.auth.register');
    }

    public function supplierStoreSupplier(Request $request)
    {
        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = 'supplier';
        $user->save();

        Auth::loginUsingId($user->id);
        dd("registred");
        // return redirect()->route('front.home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('front.home');
    }

    public function backendLogin()
    {
        return view('backend.auth.login');
    }

    public function backendAuthenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if((Auth::user()->role != 'admin')) {
                Auth::logout();
                return view('backend.auth.login', [
                    'error' => '403 - Unauthorized',
                    'email' => $request->email,
                ]);
            }
            return redirect()->route('product.index');
        } else {
            return view('backend.auth.login', [
                'error' => 'Login or password was incorrect',
                'email' => $request->email,
            ]);
        }
    }
}
