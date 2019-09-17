@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center container-mt">
        <h1>Bem vindo ao LVBLOG</h1>
        <p>O Blog mais top da web</p>
        <p>
            <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
            <a class="btn btn-success btn-lg" href="/register" role="button">Registrar-se</a>
        </p>
    </div>
@endsection