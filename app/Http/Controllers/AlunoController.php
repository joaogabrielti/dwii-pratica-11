<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Matricula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlunoController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $alunos = Aluno::all();
        return view('models.aluno.index', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('models.aluno.create');
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
            'email' => ['required', 'email', 'min:8', 'max:255'],
            'curso_id' => ['required', 'numeric', 'min:1']
        ]);
        Aluno::create($validatedData);
        return redirect(route('aluno.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function show(Aluno $aluno) {
        return redirect(route('aluno.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function edit(Aluno $aluno) {
        return view('models.aluno.create', compact('aluno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aluno $aluno) {
        $validatedData = $request->validate([
            'nome' => ['required', 'string', 'min:8', 'max:255'],
            'email' => ['required', 'email', 'min:8', 'max:255'],
            'curso_id' => ['required', 'numeric', 'min:1']
        ]);
        $aluno->update($validatedData);
        return redirect(route('aluno.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aluno $aluno) {
        $aluno->delete();
        return redirect(route('aluno.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function editMatriculas(Aluno $aluno) {
        return view('models.aluno.matricula', compact('aluno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function updateMatriculas(Request $request, Aluno $aluno) {
        // Limpa as matrículas
        DB::table('matriculas')->where('aluno_id', $aluno->id)->delete();

        // Recadastra as matrículas selecionadas no formulário
        foreach ($request->disciplinas as $disciplina)
            Matricula::create([
                'aluno_id' => $aluno->id,
                'disciplina_id' => $disciplina
            ]);

        return redirect(route('aluno.index'));
    }
}
