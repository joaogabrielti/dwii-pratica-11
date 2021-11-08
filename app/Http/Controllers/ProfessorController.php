<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $professors = Professor::all();
        return view('models.professor.index', compact('professors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('models.professor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validatedData = $request->validate([
            'nome' => ['required', 'string', 'min:8', 'max:255'],
            'email' => ['required', 'email', 'min:8', 'max:255']
        ]);
        Professor::create($validatedData);
        return redirect(route('professor.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function show(Professor $professor) {
        return redirect(route('professor.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function edit(Professor $professor) {
        return view('models.professor.create', compact('professor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Professor $professor) {
        $validatedData = $request->validate([
            'nome' => ['required', 'string', 'min:8', 'max:255'],
            'email' => ['required', 'email', 'min:8', 'max:255']
        ]);
        $professor->update($validatedData);
        return redirect(route('professor.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Professor $professor) {
        $professor->delete();
        return redirect(route('professor.index'));
    }
}
