@extends('layouts.app', ['pageTitle' => isset($aluno) ? 'Editar Aluno' : 'Novo Aluno', 'pageIcon' => 'images/aluno_ico.png'])

@section('content')
<form class="row g-2" action="{{ isset($aluno) ? route('aluno.update', ['aluno' => $aluno->id]) : route('aluno.store') }}" method="POST">
    @csrf
    @isset($aluno)
        @method('PUT')
    @endisset
    <div class="col-4">
        <label class="form-label mb-0" for="nome">Nome</label>
        <input class="form-control @error('nome'){{ 'is-invalid' }}@enderror" type="text" name="nome" id="nome" value="{{ $aluno->nome ?? old('nome') }}" placeholder="Nome">
        @error('nome')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-4">
        <label class="form-label mb-0" for="email">Email</label>
        <input class="form-control @error('email'){{ 'is-invalid' }}@enderror" type="text" name="email" id="email" value="{{ $aluno->email ?? old('email') }}" placeholder="Email">
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-4">
        <label class="form-label mb-0" for="curso_id">Curso</label>
        <select class="form-control @error('curso_id'){{ 'is-invalid' }}@enderror" name="curso_id" id="curso_id">
            @foreach (App\Models\Curso::all() as $curso)
            <option value="{{ $curso->id }}" @isset($aluno){{ ($aluno->curso_id == $curso->id) ? 'selected' : '' }}@endisset>{{ $curso->nome }}</option>
            @endforeach
        </select>
        @error('curso_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12 d-flex">
        <a class="btn btn-secondary me-1 w-100" href="{{ route('aluno.index') }}">Voltar</a>
        <button class="btn btn-primary ms-1 w-100" type="submit">Salvar</button>
    </div>
</form>
@endsection
