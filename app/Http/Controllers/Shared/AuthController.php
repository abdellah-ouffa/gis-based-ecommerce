<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Customer;

class AuthController extends Controller
{
    public function frontLogin()
    {
    	return view('frontend.auth.register', ['form' => 'login']);
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

    public function frontRegister()
    {
        return view('frontend.auth.register', ['form' => 'register']);
    }

    public function frontStoreCustomer(Request $request)
    {
        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = 'customer';
        $user->save();

        $customer = new Customer();
        $customer->tel = $request->input('tel');
        $customer->gender = $request->input('gender');
        $customer->birth_date = $request->input('birth_date');
        $customer->user_id = $user->id;
        $customer->save();
        Auth::loginUsingId($user->id);

        return redirect()->route('front.home');
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
            if(Auth::user()->role == 'admin') {
                return redirect()->route('product.index');
            } elseif(Auth::user()->role == 'supplier') {
                return redirect()->route('supplier.index');
            } else {
                Auth::logout();
                return view('backend.auth.login', [
                    'error' => '403 - Unauthorized',
                    'email' => $request->email,
                ]);
            }
        } else {
            return view('backend.auth.login', [
                'error' => 'Login or password was incorrect',
                'email' => $request->email,
            ]);
        }
    }
}
