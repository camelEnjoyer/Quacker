<?php

namespace App\Http\Controllers;

use App\Models\Quack;
use App\Models\Quashtag;
use App\Models\User;
use Illuminate\Http\Request;

class QuackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quacks = Quack::all();
        return view('quacks.index', [
            'quacks' => $quacks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('quacks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //dd(auth(), auth()->user());   
     
        $request->validate([
            'contenido' => 'required|string'
        ]);

        //Crear Quack
        $quack = auth()->user()->quacks()->create([
            'contenido' => $request->contenido,
        ]);

        //Extraer quashtags del texto
        preg_match_all('/#(\w+)/u', $quack->contenido, $matches);
        $quashtagNames = array_unique($matches[1]);

        //Buscar o crear los quashtags
        $quashtags = [];
        foreach ($quashtagNames as $name){
            $quashtag = Quashtag::firstOrCreate(['name' => $name]);
            $quashtags[] = $quashtag->id;
        }

        //Asociar los quashtag al quack
        if(!empty($quashtags)){
            $quack->quashtags()->sync($quashtags);
        }

        return redirect('/feed');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('quacks.show', [
            'quack' => Quack::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('quacks.edit', [
            'quack' => Quack::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $quack = Quack::find($id);
        $quack->update(request()->all());
        return redirect('/quacks');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quack $quack)
    {
        if ($quack->user_id !== auth()->id()) {
            abort(403);
        }

        $quack->delete();
        return redirect('/feed');
    }

    public function quav(Quack $quack)
    {
        $user = auth()->user();

        // Evita que el usuario dé like varias veces
        if (!$quack->quavers->contains($user->id)) {
            $quack->quavers()->attach($user->id);
        }

        return redirect('/feed');
    }

    public function unquav(Quack $quack)
    {
        $user = auth()->user();
        $quack->quavers()->detach($user->id);

        return redirect('/feed');
    }

    public function requack(Quack $quack)
    {
        $user = auth()->user();

        // Evitar requack duplicado
        if (!$quack->requackers->contains($user->id)) {
            $quack->requackers()->attach($user->id);
        }

        return redirect()->back();
    }

    public function unrequack(Quack $quack)
    {
        $user = auth()->user();
        $quack->requackers()->detach($user->id);

        return redirect()->back();
    }
}
