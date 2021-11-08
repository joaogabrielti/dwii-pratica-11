<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use Illuminate\Http\Request;

class DisciplinaController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $disciplinas = Disciplina::all();
        return view('models.disciplina.index', compact('disciplinas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('models.disciplina.create');
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
            'professor_id' => ['required', 'numeric', 'min:1'],
            'curso_id' => ['required', 'numeric', 'min:1']
        ]);
        Disciplina::create($validatedData);
        return redirect(route('disciplina.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function show(Disciplina $disciplina) {
        return redirect(route('disciplina.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function edit(Disciplina $disciplina) {
        return view('models.disciplina.create', compact('disciplina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disciplina $disciplina) {
        $validatedData = $request->validate([
            'nome' => ['required', 'string', 'min:8', 'max:255'],
            'professor_id' => ['required', 'numeric', 'min:1'],
            'curso_id' => ['required', 'numeric', 'min:1']
        ]);
        $disciplina->update($validatedData);
        return redirect(route('disciplina.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disciplina $disciplina) {
        $disciplina->delete();
        return redirect(route('disciplina.index'));
    }
}
