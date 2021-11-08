@extends('layouts.app', ['pageTitle' => 'Alunos', 'pageIcon' => 'images/aluno_ico.png'])

@section('content')
<a class="btn btn-primary w-100 mb-2" href="{{ route('aluno.create') }}">Cadastrar Novo Aluno</a>
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-secondary">
            <th>ID</th>
            <th>NOME</th>
            <th>EMAIL</th>
            <th>CURSO</th>
            <th>DISCIPLINAS</th>
            <th>AÇÕES</th>
        </thead>
        <tbody>
            @foreach ($alunos as $aluno)
            <tr>
                <td style="vertical-align: middle;">{{ $aluno->id }}</td>
                <td style="vertical-align: middle;">{{ $aluno->nome }}</td>
                <td style="vertical-align: middle;">{{ $aluno->email }}</td>
                <td style="vertical-align: middle;">{{ $aluno->curso->nome }}</td>
                <td style="vertical-align: middle;">
                    <select class="form-control form-control-sm">
                        @foreach ($aluno->matriculas as $matricula)
                        <option>{{ $matricula->disciplina->nome }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="text-center" style="vertical-align: middle;">
                    <a class="link-primary mx-1" href="{{ route('aluno.edit', ['aluno' => $aluno->id]) }}"><i class="bi bi-pencil-fill"></i></a>
                    <a class="link-secondary mx-1" href="{{ route('aluno.editMatriculas', ['aluno' => $aluno->id]) }}"><i class="bi bi-gear-fill"></i></a>
                    <a class="link-danger mx-1" href="#" onclick="document.querySelector('#delete-{{ $aluno->id }}').submit()"><i class="bi bi-trash-fill"></i></a>
                    <form id="delete-{{ $aluno->id }}" action="{{ route('aluno.destroy', ['aluno' => $aluno->id]) }}" method="POST">
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
