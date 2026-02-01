<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Mostrar formulario de registro
    public function create()
    {
        return view('users.create');
    }

    // Guardar nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'nickname' => 'required|string|max:255|unique:users,nickname',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed', // Confirmar con password_confirmation
        ]);

        User::create([
            'full_name' => $request->full_name,
            'nickname' => $request->nickname,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
        ]);

        // Redirige al login después de registrarse
        return redirect()->route('login')
            ->with('success', 'Cuenta creada correctamente, inicia sesión.');
    }


    // Método show para mostrar perfil de usuario
    public function show(User $user)
    {
        // Aquí podrías traer sus quacks si quieres
        $quacks = $user->quacks()->latest()->get();

        return view('users.show', compact('user', 'quacks'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'nickname' => 'required|string|max:255|unique:users,nickname,' . $user->id,
            'bio' => 'nullable|string|max:500',
        ]);

        $user->update($request->only(['full_name', 'nickname', 'bio']));

        return redirect()->route('users.show', $user->id)
            ->with('success', 'Perfil actualizado.');
    }

    public function search(Request $request)
    {
        $query = $request->get('q', '');

        $users = User::where('full_name', 'like', "%{$query}%")
            ->orWhere('nickname', 'like', "%{$query}%")
            ->where('id', '!=', auth()->id()) // no incluirme a mí
            ->get();

        return view('users.search', compact('users', 'query'));
    }

    public function destroy(User $user)
    {
        if (Auth::id() !== $user->id) {
            abort(403, 'No tienes permiso para borrar esta cuenta.');
        }

        Auth::logout();
        $user->delete();

        return redirect('/login')->with('success', 'Cuenta eliminada correctamente.');
    }

}
