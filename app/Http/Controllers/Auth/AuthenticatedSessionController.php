<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();  // Valida credenciales
    $request->session()->regenerate();  // Regenera la sesión

    // Redirigir según el rol del usuario
    if (auth()->user()->isSuperAdmin()) {
        return redirect()->route('config.equip');  // Para Sadmin
    }
    return redirect()->route('dashboard');  // Para admin (rol por defecto)
}

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
