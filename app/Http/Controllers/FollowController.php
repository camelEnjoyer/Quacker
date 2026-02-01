<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    // Seguir a un usuario
    public function follow(User $user)
    {
        $authUser = Auth::user();

        // Evitar seguirse a sí mismo
        if ($authUser->id === $user->id) {
            return redirect()->back()->with('error', 'No puedes seguirte a ti mismo.');
        }

        // Seguir si aún no lo sigue
        if (!$authUser->follows->contains($user->id)) {
            $authUser->follows()->attach($user->id);
        }

        return redirect()->back()->with('success', 'Has empezado a seguir a ' . $user->nickname);
    }

    // Dejar de seguir a un usuario
    public function unfollow(User $user)
    {
        $authUser = Auth::user();

        // Evitar dejar de seguir a sí mismo (aunque normalmente no aparecería)
        if ($authUser->id === $user->id) {
            return redirect()->back()->with('error', 'No puedes dejar de seguirte a ti mismo.');
        }

        // Dejar de seguir si ya lo sigue
        if ($authUser->follows->contains($user->id)) {
            $authUser->follows()->detach($user->id);
        }

        return redirect()->back()->with('success', 'Has dejado de seguir a ' . $user->nickname);
    }
}
