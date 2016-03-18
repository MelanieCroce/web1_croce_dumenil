@extends('layouts.app', ['pageTitle' => 'Ajouter un article'])

@section('content')
    @include('partials.articles.form', ['action' => 'create'])
    @include('partials.articles.errors')
@endsection