@extends('layouts.app')
@section('content')
    <h1>Editar comentário</h1>
    {!! Form::open(['action' => ['CommentsController@update', $comment->comment_id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            <br>
            {{Form::text('body', $comment->body, ['class' => 'form-control', 'placeholder' => 'Edite seu Comentário...'])}}
            <br>
        </div>        
        {{Form::hidden('_method','PUT')}}        
        {{Form::submit('submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection