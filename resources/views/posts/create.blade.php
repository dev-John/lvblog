@extends('layouts.app')

@section('content')
    <h1>Criar publicação</h1>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Título')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Título'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Conteúdo')}}
            {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Escreva sua publicação...'])}}
        </div>
        {{Form::submit('submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection