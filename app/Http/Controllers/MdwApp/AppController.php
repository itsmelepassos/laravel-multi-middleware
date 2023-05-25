<?php

namespace App\Http\Controllers\MdwApp;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    /**
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @throws \Psr\Container\NotFoundExceptionInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     */
    public function dashboard()
    {
        if (!Auth::guard('app')->check()) {
            return redirect()->route('app.login');
        }

        $userGuard = User::activeGuard();

        return view('app.dashboard', [
            'userGuard' => $userGuard,
        ]);
    }

    /**
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @throws \Symfony\Component\Routing\Exception\RouteNotFoundException
     */
    public function logout()
    {
        Auth::guard('app')->logout();
        return redirect()->route('app.login');
    }
}
