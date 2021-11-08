@extends('layouts.app', ['pageTitle' => 'Gerenciar Matrículas', 'pageIcon' => 'images/aluno_ico.png'])

@section('content')
<form class="row g-2" action="{{ route('aluno.editMatriculas', ['aluno' => $aluno->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="col-2 d-flex align-items-center justify-content-center">
        <a class="btn btn-secondary" href="{{ route('aluno.index') }}">Voltar</a>
    </div>
    <div class="col-10">
        <div class="card bg-light">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('images/curso_ico.png') }}" width="48px" height="48px">
                    <h4 class="fs-5 mb-0 ms-4 me-auto">{{ $aluno->curso->nome }}</h4>
                    <img src="{{ asset('images/aluno_ico.png') }}" width="48px" height="48px">
                    <h4 class="fs-5 mb-0 ms-4">{{ $aluno->nome }}</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card bg-light">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-center">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/conn.png') }}" width="64px" height="64px">
                        <h4 class="fs-3 mb-0 ms-4 me-auto">Matrículas do Aluno</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover">
                @foreach (App\Models\Disciplina::where('curso_id', $aluno->curso_id)->get() as $disciplina)
                <tr>
                    <td style="width: 1%; white-space: nowrap;">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="disciplinas[]" value="{{ $disciplina->id }}"
                                @foreach ($aluno->matriculas as $matricula)
                                    {{ ($disciplina->id == $matricula->disciplina_id) ? 'checked' : '' }}
                                @endforeach
                            >
                        </div>
                    </td>
                    <td>{{ $disciplina->nome }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="col-12">
        <button class="btn btn-primary w-100" type="submit">Confirmar Matrículas</button>
    </div>
</form>
@endsection
