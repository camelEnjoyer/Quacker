<?php

namespace App\Http\Controllers;

use App\Models\Quashtag;
use Illuminate\Http\Request;

class QuashtagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quashtag = Quashtag::all();
        return view('quashtags.index', [
            'quashtags' => $quashtag
        ]);

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('quashtags.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Quashtag::create($request->all());
        return redirect('/quashtags');
    }
    /**
     * Display the specified resource.
     */
    public function show(Quashtag $quashtag)
    {
        return view('quashtags.show', [
            'quashtags' => $quashtag
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quashtag $quashtag)
    {
        return view('quashtags.edit', [
            'quashtag' => $quashtag
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quashtag $quashtag)
    {
        $quashtag->update($request->all());
        return redirect('/quashtags');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quashtag $quashtag)
    {
        $quashtag->delete();
        return redirect('/quashtags');
    }

    public function quacks(Quashtag $quashtag)
    {
        // Obtener los quacks asociados al quashtag
        $quacks = $quashtag->quacks()
            ->with('user')            
            ->orderBy('created_at', 'desc')
            ->get();

        return view('quashtags.quacks', compact('quacks', 'quashtag'));
    }
}
