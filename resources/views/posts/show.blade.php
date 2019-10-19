@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-default">Voltar</a>
    <h1>{{$post->title}}</h1>
    <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
    <br><br>
    <div>
        {!!$post->body!!}
    </div>
    <hr><small>Escrito em {{$post->created_at}}</small>
    <hr>
    <div class="row ml-2">
        <div class="col-xs-4">
            <a href="/posts/{{$post->id}}/edit" class="btn btn-outline-primary">Editar</a>
        </div>
        <div class="col-xs-4">

            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Excluir', ['class' => 'btn btn-outline-danger ml-2'])}}
            {!!Form::close()!!}
        </div>
    </div>
@endsection