<?php

namespace App\Http\Controllers;

use App\Models\Quack;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class feedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        // Usuarios que sigo + yo
        $follows = $user->follows()->pluck('id')->toArray();
        $userIds = array_merge([$user->id], $follows);

        // Quacks de esos usuarios
        $quacks = Quack::with(['user', 'quashtags','quavers' ,'requackers'])
            ->whereIn('user_id', $userIds)
            ->orderBy('created_at', 'desc')
            ->get();

        // Usuarios que no sigo (para sugerencias / perfiles)
        $otherUsers = User::where('id', '!=', $user->id)
            ->whereNotIn('id', $follows)
            ->get();

        return view('feed', compact('quacks', 'otherUsers'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
