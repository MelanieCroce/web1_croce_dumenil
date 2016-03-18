@extends('layouts.app', ['pageTitle' => 'Liste des articles'])

@section('content')
{!! Form::model($users, ['route' => ['profil.update', $users->id], 'method' => 'PUT']) !!}

    <div class="form-group">
        {!! Form::text('name', $users->name, [
            'class' => 'form-control',
            'placeholder' => 'name'
        ]) !!}
	</div>

    <div class="form-group">
        {!! Form::text('email', $users->email, [
            'class' => 'form-control',
            'placeholder' => 'mail'
        ]) !!}
	</div>

    <div class="form-group">
        {!! Form::text('password', 'Modifier votre mot de passe', [
            'class' => 'form-control',
            'placeholder' => 'modifier son mot de passe'
        ]) !!}
	</div>

    <div class="form-group">
        {!! Form::text('password', 'Confirmer votre mot de passe', [
            'class' => 'form-control',
            'placeholder' => 'Confirmer votre mot de passe'
        ]) !!}
	</div>

    {!! Form::submit('Envoyer', ['class' => 'btn btn-block']) !!}
{!! Form::close() !!}

@include('partials.articles.errors')
@endsection