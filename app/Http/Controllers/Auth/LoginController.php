<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }

    public function index()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {
    // Validate the form data
    $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
    ]);
    // Attempt to log the user in
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1], $request->remember)) {
        // if successful, then redirect to their intended location
        return redirect()->intended(route('home'));
    }
    // if unsuccessful, then redirect back to the login with the form data
    return redirect()->back()->withInput($request->only('email', 'remember'));
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}