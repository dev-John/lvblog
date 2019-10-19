@extends('layouts.app')

@section('content')
    <h1>Editar publicação</h1>
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Título')}}
            {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Título'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Conteúdo')}}
            {!!Form::textarea('body', $post->body, ['id' => 'article-editor', 'class' => 'form-control', 'placeholder' => 'Escreva sua publicação...'])!!}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        
        {{Form::hidden('_method','PUT')}}        
        {{Form::submit('submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection