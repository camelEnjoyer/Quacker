<?php

namespace App\Http\Controllers;

use App\Models\Quack;
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

        // IDs de los usuarios que sigo + yo mismo
        $userIds = $user->follows()->pluck('followed_id')->toArray();
        $userIds[] = $user->id;

        // Solo quacks de esos usuarios, ordenados por fecha
        $quacks = Quack::with('user')
            ->whereIn('user_id', $userIds)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('feed', compact('quacks'));
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
