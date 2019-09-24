@extends('layouts.app')

@section('content')
    @if(count($posts) >1)
        @foreach($posts as $post)
            <div class="jumbotron">
                <h3>{{$post->title}}</h3>
                <small>Escrito em {{$post->created_at}}</small>
            </div>
        @endforeach
    @else
        <p>Sem publicações até o momento</p>
    @endif
@endsection