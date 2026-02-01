<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\SessionRequest;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create()
    {

        return view('auth.login');

    }

    public function store(SessionRequest $request)
    {
        $attributes = $request->validated();
        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'No se pudo iniciar sesión'
            ]);

        }

        request()->session()->regenerate();
        return redirect('/feed');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
