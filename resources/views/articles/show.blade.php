@extends('layouts.app', ['pageTitle' => 'Article n°'.$post->id])

@section('content')
    <h2>{{$post->title}} <br> Auteur: {{ $post->user->name }} </h2>
    <p>{{$post->content}}</p>
	@foreach($comment as $comment)
	<h3>{{ $comment->user->name }}</h3>
		<div>{{ $comment->content }}</div>
	@endforeach

	@include('partials.articles.comment', [ 'id_post' => $post->id ])
    @include('partials.articles.errors')

@endsection