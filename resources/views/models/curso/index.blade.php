@extends('layouts.app', ['pageTitle' => 'Cursos', 'pageIcon' => 'images/curso_ico.png'])

@section('content')
<a class="btn btn-primary w-100 mb-2" href="{{ route('curso.create') }}">Cadastrar Novo Curso</a>
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-secondary">
            <th>ID</th>
            <th>NOME DO CURSO</th>
            <th>AÇÕES</th>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
            <tr>
                <td>{{ $curso->id }}</td>
                <td>{{ $curso->nome }}</td>
                <td class="text-center">
                    <a class="link-primary mx-1" href="{{ route('curso.edit', ['curso' => $curso->id]) }}"><i class="bi bi-pencil-fill"></i></a>
                    <a class="link-danger mx-1" href="#" onclick="document.querySelector('#delete-{{ $curso->id }}').submit()"><i class="bi bi-trash-fill"></i></a>
                    <form id="delete-{{ $curso->id }}" action="{{ route('curso.destroy', ['curso' => $curso->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
