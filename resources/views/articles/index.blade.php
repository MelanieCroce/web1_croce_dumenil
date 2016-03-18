@extends('layouts.app')
<div class="container">
@section('content')
	@foreach($posts as $post)
	<div class="box_articles">
        <h3>{{$post->title}}</h3>
        <p>{{$post->content}}</p>
        <a href="{{route('articles.show', $post->id)}}">
            <button>Voir l'article</button>
        </a>
	</div>
    @endforeach
</div>
@endsection
