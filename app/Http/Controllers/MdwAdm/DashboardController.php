<?php

namespace App\Http\Controllers\MdwAdm;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $userGuard = User::activeGuard();

        return view('admin.dashboard', [
            'userGuard' => $userGuard
        ]);
    }

    /**
     *
     * @return int|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @throws \Psr\Container\NotFoundExceptionInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     */
    public function activeGuard()
    {
        foreach (array_keys(config('auth.guards')) as $guard) {

            if (auth()->guard($guard)->check()) return $guard;
        }
        return null;
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
