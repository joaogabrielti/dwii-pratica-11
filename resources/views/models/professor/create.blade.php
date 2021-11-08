@extends('layouts.app', ['pageTitle' => isset($professor) ? 'Editar Professor' : 'Novo Professor', 'pageIcon' => 'images/professor_ico.png'])

@section('content')
<form class="row g-2" action="{{ isset($professor) ? route('professor.update', ['professor' => $professor->id]) : route('professor.store') }}" method="POST">
    @csrf
    @isset($professor)
        @method('PUT')
    @endisset
    <div class="col-6">
        <label class="form-label mb-0" for="nome">Nome</label>
        <input class="form-control @error('nome'){{ 'is-invalid' }}@enderror" type="text" name="nome" id="nome" value="{{ $professor->nome ?? old('nome') }}" placeholder="Nome">
        @error('nome')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-6">
        <label class="form-label mb-0" for="email">Email</label>
        <input class="form-control @error('email'){{ 'is-invalid' }}@enderror" type="text" name="email" id="email" value="{{ $professor->email ?? old('email') }}" placeholder="Email">
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12 d-flex">
        <a class="btn btn-secondary me-1 w-100" href="{{ route('professor.index') }}">Voltar</a>
        <button class="btn btn-primary ms-1 w-100" type="submit">Salvar</button>
    </div>
</form>
@endsection
