<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserQuacksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        // Solo traemos los quacks del usuario, ordenados de más reciente a más antiguo
        $quacks = $user->quacks()->orderBy('created_at', 'desc')->get();

        // Enviamos a la vista
        return view('users.quacks', compact('user', 'quacks'));
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
