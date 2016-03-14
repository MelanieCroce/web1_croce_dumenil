
@extends('layouts.app', ['pageTitle' => 'Edition de l\'article n°'.$post->id])

@section('content')
    @include('partials.articles.form', ['action' => 'edit'])
    @include('partials.articles.errors')
@endsection