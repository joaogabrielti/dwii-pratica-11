@extends('layouts.app', ['pageTitle' => 'Acesso Negado', 'pageIcon' => 'images/restrito.png'])

@section('content')
<div class="row g-2 mt-4">
    <div class="col-12">
        <a class="d-flex flex-column align-items-center link-secondary text-decoration-none" href="{{ route('index') }}">
            <img class="img-fluid" src="{{ asset('images/restrito.png') }}" width="128" height="128">
            <span class="fs-5 fw-bold">Acesso Negado</span>
        </a>
    </div>
</div>
@endsection
