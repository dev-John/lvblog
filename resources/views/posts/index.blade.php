@extends('layouts.app')

@section('content')
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>

                        <p>
                            {{ substr(strip_tags($post->body),0,50) }}
                            {{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}
                        </p>
                        
                        <small>Escrito em {{$post->created_at}}</small>
                    </div>
                </div>                
            </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>Sem publicações até o momento</p>
    @endif
@endsection