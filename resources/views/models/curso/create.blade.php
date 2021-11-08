@extends('layouts.app', ['pageTitle' => isset($curso) ? 'Editar Curso' : 'Novo Curso', 'pageIcon' => 'images/curso_ico.png'])

@section('content')
<form class="row g-2" action="{{ isset($curso) ? route('curso.update', ['curso' => $curso->id]) : route('curso.store') }}" method="POST">
    @csrf
    @isset($curso)
        @method('PUT')
    @endisset
    <div class="col-12">
        <label class="form-label mb-0" for="nome">Nome do Curso</label>
        <input class="form-control @error('nome'){{ 'is-invalid' }}@enderror" type="text" name="nome" id="nome" value="{{ $curso->nome ?? old('nome') }}" placeholder="Nome do Curso">
        @error('nome')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12 d-flex">
        <a class="btn btn-secondary me-1 w-100" href="{{ route('curso.index') }}">Voltar</a>
        <button class="btn btn-primary ms-1 w-100" type="submit">Salvar</button>
    </div>
</form>
@endsection
