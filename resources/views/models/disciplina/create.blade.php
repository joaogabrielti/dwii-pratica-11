@extends('layouts.app', ['pageTitle' => isset($disciplina) ? 'Editar Disciplina' : 'Novo Disciplina', 'pageIcon' => 'images/disciplina_ico.png'])

@section('content')
<form class="row g-2" action="{{ isset($disciplina) ? route('disciplina.update', ['disciplina' => $disciplina->id]) : route('disciplina.store') }}" method="POST">
    @csrf
    @isset($disciplina)
        @method('PUT')
    @endisset
    <div class="col-4">
        <label class="form-label mb-0" for="nome">Nome</label>
        <input class="form-control @error('nome'){{ 'is-invalid' }}@enderror" type="text" name="nome" id="nome" value="{{ $disciplina->nome ?? old('nome') }}" placeholder="Nome">
        @error('nome')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-4">
        <label class="form-label mb-0" for="professor_id">Professor</label>
        <select class="form-control @error('professor_id'){{ 'is-invalid' }}@enderror" name="professor_id" id="professor_id">
            @foreach (App\Models\Professor::all() as $professor)
            <option value="{{ $professor->id }}" @isset($disciplina){{ ($disciplina->professor_id == $professor->id) ? 'selected' : '' }}@endisset>{{ $professor->nome }}</option>
            @endforeach
        </select>
        @error('professor_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-4">
        <label class="form-label mb-0" for="curso_id">Curso</label>
        <select class="form-control @error('curso_id'){{ 'is-invalid' }}@enderror" name="curso_id" id="curso_id">
            @foreach (App\Models\Curso::all() as $curso)
            <option value="{{ $curso->id }}" @isset($disciplina){{ ($disciplina->curso_id == $curso->id) ? 'selected' : '' }}@endisset>{{ $curso->nome }}</option>
            @endforeach
        </select>
        @error('curso_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12 d-flex">
        <a class="btn btn-secondary me-1 w-100" href="{{ route('disciplina.index') }}">Voltar</a>
        <button class="btn btn-primary ms-1 w-100" type="submit">Salvar</button>
    </div>
</form>
@endsection
