<?php

namespace App\Http\Controllers;

use App\Models\quashtags;
use Illuminate\Http\Request;

class QuashtagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quashtag = quashtags::all();
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
        quashtags::create($request->all());
        return redirect('/quashtags');
    }
    /**
     * Display the specified resource.
     */
    public function show(quashtags $quashtag)
    {
        return view('quashtags.show', [
            'quashtags' => $quashtag
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(quashtags $quashtag)
    {
        return view('quashtags.edit', [
            'quashtags' => $quashtag
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, quashtags $quashtag)
    {
        $quashtag->update($request->all());
        return redirect('/quashtags');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(quashtags $quashtag)
    {
        $quashtag->delete();
        return redirect('/quashtags');
    }
}
