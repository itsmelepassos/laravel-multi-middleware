<?php

namespace App\Http\Controllers\MdwAdm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::guard('admin')->check() === true) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth');
    }

    public function auth(Request $request)
    {
        if (Auth::guard('admin')->check() === true) {
            return redirect()->route('admin.dashboard');
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (!Auth::guard('admin')->attempt($credentials)) {
            echo "Não é válido!";
        }

        return redirect()->route('admin.dashboard');
    }
}
