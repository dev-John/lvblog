@extends('layouts.app')

@section('content')
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="jumbotron">
                <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                <small>Escrito em {{$post->created_at}}</small>
            </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>Sem publicações até o momento</p>
    @endif
@endsection