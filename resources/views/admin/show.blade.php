@extends('layouts.app', ['pageTitle' => 'Liste des articles'])

@section('content')
    @if(Session::has('erreur'))
        <h1>{{Session::get('erreur')}}</h1>
    @endif

	@if ($id == 'articles')

		@foreach($posts as $post)
			<h3>{{$post->title}}</h3>
			<p>{{$post->content}}</p>
			<a href="{{route('articles.show', $post->id)}}">
				<button>Voir l'article</button>
			</a>

				<a href="{{route('articles.edit', $post->id, 'post')}}">
					<button>Editer l'article</button>
				</a>
				{!! Form::model($post, ['route' => ['articles.destroy', $post->id], 'method' => 'POST']) !!}
					<input type="hidden" name="type" value="post">
					<input type="hidden" name="_method" value="DELETE">
					<button>Supprimer l'article</button>
				{!! Form::close() !!}
		@endforeach

	@elseif ($id == 'projets') 


	@elseif ($id == 'comments')

		@foreach($comments as $comments)
			<p>{{ $comments->content }} Par {{ $comments->user->name }}</p>

				{!! Form::model($comments, ['route' => ['articles.destroy', $comments->id], 'method' => 'POST']) !!}
					<input type="hidden" name="type" value="comment">
					<input type="hidden" name="_method" value="DELETE">
					<button>Supprimer le commentaire</button>
				{!! Form::close() !!}
		@endforeach

	@endif

@endsection