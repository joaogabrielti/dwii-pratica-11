@extends('layouts.app', ['pageTitle' => 'Disciplinas', 'pageIcon' => 'images/disciplina_ico.png'])

@section('content')
<a class="btn btn-primary w-100 mb-2" href="{{ route('disciplina.create') }}">Cadastrar Nova Disciplina</a>
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-secondary">
            <th>ID</th>
            <th>NOME</th>
            <th>PROFESSOR</th>
            <th>CURSO</th>
            <th>AÇÕES</th>
        </thead>
        <tbody>
            @foreach ($disciplinas as $disciplina)
            <tr>
                <td>{{ $disciplina->id }}</td>
                <td>{{ $disciplina->nome }}</td>
                <td>{{ $disciplina->professor->nome }}</td>
                <td>{{ $disciplina->curso->nome }}</td>
                <td class="text-center">
                    <a class="link-primary mx-1" href="{{ route('disciplina.edit', ['disciplina' => $disciplina->id]) }}"><i class="bi bi-pencil-fill"></i></a>
                    <a class="link-danger mx-1" href="#" onclick="document.querySelector('#delete-{{ $disciplina->id }}').submit()"><i class="bi bi-trash-fill"></i></a>
                    <form id="delete-{{ $disciplina->id }}" action="{{ route('disciplina.destroy', ['disciplina' => $disciplina->id]) }}" method="POST">
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
