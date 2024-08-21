<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller {
    use ResponseTrait;

    public function login(Request $request) {
        if ($request->isMethod('post')) {

            $request->validate([
                'email'    => ['required', 'email'],
                'password' => ['required', 'min:6'],
            ]);

            $admin    = User::where('email', $request->email)->first();
            $remember = $request->remember ? true : false;

            if ($admin && Auth::attempt($request->only(['email', 'password']), $remember)) {
                $this->responseMessage("success", "Your are logged in");
                return redirect()->intended('/backend');
            }

            $this->responseMessage('error', "Email or password invalid !");
            return redirect()->back()->withInput();
        } elseif (Auth::check()) {
            return redirect()->intended('/backend');
        }
        return view('backend.auth.login');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
