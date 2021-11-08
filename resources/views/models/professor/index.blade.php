@extends('layouts.app', ['pageTitle' => 'Professores', 'pageIcon' => 'images/professor_ico.png'])

@section('content')
<a class="btn btn-primary w-100 mb-2" href="{{ route('professor.create') }}">Cadastrar Novo Professor</a>
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-secondary">
            <th>ID</th>
            <th>NOME</th>
            <th>EMAIL</th>
            <th>AÇÕES</th>
        </thead>
        <tbody>
            @foreach ($professors as $professor)
            <tr>
                <td>{{ $professor->id }}</td>
                <td>{{ $professor->nome }}</td>
                <td>{{ $professor->email }}</td>
                <td class="text-center">
                    <a class="link-primary mx-1" href="{{ route('professor.edit', ['professor' => $professor->id]) }}"><i class="bi bi-pencil-fill"></i></a>
                    <a class="link-danger mx-1" href="#" onclick="document.querySelector('#delete-{{ $professor->id }}').submit()"><i class="bi bi-trash-fill"></i></a>
                    <form id="delete-{{ $professor->id }}" action="{{ route('professor.destroy', ['professor' => $professor->id]) }}" method="POST">
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
