@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-default">Voltar</a>
    <h1>{{$post->title}}</h1>
    <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
    <br><br>
    <div>
        {!!$post->body!!}
    </div>
    <hr>
        <div class="row ml-2">
            <div class="col-xs-2"><small>Escrito em {{$post->created_at}} por {{$post->user->name}}</small></div>
            @if(!Auth::guest())
                @if(Auth::user()->id == $post->user_id)
                    <div class="col-xs-4 ml-3">
                        <a href="/posts/{{$post->id}}/edit" class="btn btn-outline-primary">Editar</a>
                    </div>
                    <div class="col-xs-4">

                        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Excluir', ['class' => 'btn btn-outline-danger ml-2'])}}
                        {!!Form::close()!!}
                    </div>
                @endif
            @endif
        </div>
    <hr>
    
    @if(count($post->comment) > 0)
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                @foreach($post->comment as $com)
                    <div class="jumbotron">
                        <div class="container">
                            <h6 class="display-10">{{$com->body}}</h6>
                            <div class="mb-4"><small>Comentário feito em {{$com->created_at}} por {{$com->user->name}}</small></div>
                            @if(!Auth::guest())
                                @if(Auth::user()->id == $com->user_id)
                                    <div class="row">
                                        <div class="col-xs-4 ml-3">
                                            <a href="/comments/{{$com->comment_id}}/edit" class="btn btn-outline-primary">Editar</a>
                                        </div>
                                        <div class="col-xs-4">
                                            {!!Form::open(['action' => ['CommentsController@destroy', $com->comment_id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Excluir', ['class' => 'btn btn-outline-danger ml-2'])}}
                                            {!!Form::close()!!}
                                        </div>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    {!! Form::open(['action' => ['CommentsController@store'], 'method' => 'POST']) !!}         
        {{Form::label('Comentar Publicação')}}
        <div class="row">
            <div class="col-md-10 col-sm-10">
                {{Form::text('comment', "", ['class' => 'form-control', 'placeholder' => 'Comente aqui...'])}}
            </div>
            <div class="col-md-2 col-sm-2">
                {{Form::submit('Comentar', ['class'=>'btn btn-primary'])}}
            </div>
            {{Form::text('id', $post->id, ['class' => 'd-none'])}}            
        </div>
        <br><br>
    {!! Form::close() !!}
@endsection