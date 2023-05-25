<?php

namespace App\Http\Controllers\MdwApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        return redirect()->route('app.login');
    }

    public function login(Request $request)
    {
        if (Auth::guard('app')->check() === true) {
            return redirect()->route('app.dashboard');
        }

        if (!empty($request->_token)) {

            $credentials = [
                'email' => $request->email,
                'password' => $request->password,
            ];

            if (!Auth::guard('app')->attempt($credentials)) {
                echo "Não é válido!";
            } else {
                return redirect()->route('app.dashboard');
            }
        }

        return view('app.auth');
    }
}
