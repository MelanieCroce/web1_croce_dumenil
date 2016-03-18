@extends('layouts.app', ['pageTitle' => 'Liste des articles'])

@section('content')
   <a href="{{ url('admin/articles')  }}">Gérer les articles</a>
   <br /><a href="{{ url('admin/comments') }}">Gérer les commentaires</a>
<br />
	<br /><a href="{{ url('admin/projets')  }}">Gérer les projets</a>
@endsection