<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.pages.auth.login', [
            'title' => 'Login'
        ]);
    }
    public function authenticated(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();

            return response()->json([
                'status' => 'false',
                'title' => 'Error',
                'description' => $errors[0],
                'icon' => 'error'
            ]);
        }
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json([
                'status' => 'true',
                'title' => 'Welcome',
                'description' => 'redirects to the Admin Panel',
                'icon' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'false',
                'title' => 'Error',
                'description' => 'Email or Password Wrong.',
                'icon' => 'error'
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        return redirect('login');
    }
}
