@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-default">Voltar</a>
    <h1>{{$post->title}}</h1>
    <div>
        {{$post->body}}
    </div>
    <hr><small>Escrito em {{$post->created_at}}</small>
    <hr>
    <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Editar</a>

    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Excluir', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection