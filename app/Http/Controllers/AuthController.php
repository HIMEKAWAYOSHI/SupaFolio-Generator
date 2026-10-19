<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use  Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function showRegister(){
        return view('auth.register');
    }

    public function register(Request $request){

        $request->merge(['email_address' => strtolower((string) $request->email_address)]);

        $request->validate([
            'username' => 'required|string|max:50|unique:account,username',
            'email_address' => 'required|email|max:255|unique:account,email_address',
            'password' => 'required|min:8|confirmed',
        ]);

        $account = Account::create([
            'username' => $request->username,
            'email_address' => $request->email_address,
            'password_hash' => Hash::make($request->password),
        ]);

        Auth::login($account);
         $request->session()->regenerate();
        return redirect()->route('dashboard');

    }

    public function showLogin(){
        return view('auth.login');
    }

  public function login(Request $request)
    {
        $request->merge(['email_address' => strtolower((string) $request->email_address)]);

        $credentials = $request->validate([
            'email_address' => 'required|email',
            'password'      => 'required',
        ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended(route('dashboard'));
            }

            return back()
            ->withErrors(['email_address' => 'Email or password is incorrect.'])
            ->onlyInput('email_address');
    }

    public function logout(Request $request)
    {
        Auth::logout();
           
        $request->session()->invalidate();    
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }


}
