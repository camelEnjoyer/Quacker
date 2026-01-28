<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
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
}
