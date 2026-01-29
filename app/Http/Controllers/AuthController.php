<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
 
function ShowSignupForm() {
    return view('auth.signup' , ['title' => 'Signup']) ;     

}

public function Signup(SignupRequest $request) {
     
    $user = new User() ;
    $user->name = $request->input('name') ;
    $user->email = $request->input('email') ;
    $user->password = bcrypt($request->input('password')) ;
    $user->save();

    Auth::login($user); // this will log the user in after signup 

    return redirect('/');


}


public function ShowLoginForm() {
    return view('auth.login' , ['title' => 'Login']) ;     


}

public function Login(LoginRequest $request) {  
    $credentials = request()->only('email', 'password');

    if(Auth::attempt($credentials)) { // this will check the credentials
        // Authentication passed...
        $request =  redirect()->regenerate();// prevent session fixation
        return redirect('/') ;
    } else {
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput() ;
    }
}


public function logout()   {
    Auth::logout();
    return redirect('/');
}

}
