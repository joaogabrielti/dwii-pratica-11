@extends('layouts.app')

@section('content')
<div class="row g-2 mt-4">
    <div class="col-6 col-md-3">
        <a class="d-flex flex-column align-items-center link-secondary text-decoration-none" href="{{ route('curso.index') }}">
            <img class="img-fluid" src="{{ asset('images/curso_ico.png') }}" width="128" height="128">
            <span class="fs-5 fw-bold">Cursos</span>
        </a>
    </div>
    <div class="col-6 col-md-3">
        <a class="d-flex flex-column align-items-center link-secondary text-decoration-none" href="{{ route('disciplina.index') }}">
            <img class="img-fluid" src="{{ asset('images/componente_ico.png') }}" width="128" height="128">
            <span class="fs-5 fw-bold">Disciplinas</span>
        </a>
    </div>
    <div class="col-6 col-md-3">
        <a class="d-flex flex-column align-items-center link-secondary text-decoration-none" href="{{ route('professor.index') }}">
            <img class="img-fluid" src="{{ asset('images/professor_ico.png') }}" width="128" height="128">
            <span class="fs-5 fw-bold">Professores</span>
        </a>
    </div>
    <div class="col-6 col-md-3">
        <a class="d-flex flex-column align-items-center link-secondary text-decoration-none" href="{{ route('aluno.index') }}">
            <img class="img-fluid" src="{{ asset('images/aluno_ico.png') }}" width="128" height="128">
            <span class="fs-5 fw-bold">Alunos</span>
        </a>
    </div>
</div>
@endsection
