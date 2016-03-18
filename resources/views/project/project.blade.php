@extends('layouts.app', ['pageTitle' => 'Liste des articles'])

@section('content')


<h1>Envoyer un projet</h1>

<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

{!! Form::open(array('route' => 'project_store', 'class' => 'form')) !!}

<div class="form-group">
    {!! Form::label('Votre nom') !!}
    {!! Form::text('name', null,
        array('required',
              'class'=>'form-control',
              'placeholder'=>'Nom')) !!}
</div>


<div class="form-group">
    {!! Form::label('Nom du projet') !!}
    {!! Form::text('projet', null,
        array('required',
              'class'=>'form-control',
              'placeholder'=>'projet')) !!}
</div>

<div class="form-group">
    {!! Form::label('Votre adresse mail') !!}
    {!! Form::text('email', null,
        array('required',
              'class'=>'form-control',
              'placeholder'=>'addresse e-mail')) !!}
</div>

<div class="form-group">
    {!! Form::label('Votre adresse postale') !!}
    {!! Form::text('postale', null,
        array('required',
              'class'=>'form-control',
              'placeholder'=>'Votre adresse')) !!}
</div>


<div class="form-group">
    {!! Form::label('numéro de téléphone') !!}
    {!! Form::text('number', null,
        array('required',
              'class'=>'form-control',
              'placeholder'=>'numéro de téléphone')) !!}
</div>

<div class="form-group">
    {!! Form::label('Votre fiche identité') !!}
    {!! Form::textarea('identité', null,
        array('required',
              'class'=>'form-control',
              'placeholder'=>'Récapulatif de vos informations')) !!}
</div>

<div class="form-group">
    {!! Form::label('Type de projet') !!}
    {!! Form::select('radio',
        array('type',
              'site'=>'site internet',
              '3D'=>'3D',
              'Animation 2D'=>'Animation 2D',
              'Installation multimédia'=>'Installation multimédia',
              'Jeux Videos'=>'Jeux Videos',
              'DVD'=>'DVD',
              'Print'=>'Print',
              'CD-ROM'=>'CD-ROM',
              'evenement'=>'evenement',
            )) !!}
</div>

<div class="form-group">
    {!! Form::label('Contexte de la demande') !!}
    {!! Form::textarea('contexte', null,
        array('required',
              'class'=>'form-control',
              'placeholder'=>'Contexte')) !!}
</div>

<div class="form-group">
    {!! Form::label('Votre demande') !!}
    {!! Form::textarea('demande', null,
        array('required',
              'class'=>'form-control',
              'placeholder'=>'demande la plus précise possible')) !!}
</div>

<div class="form-group">
    {!! Form::label('Vos objectifs') !!}
    {!! Form::textarea('objectifs', null,
        array('required',
              'class'=>'form-control',
              'placeholder'=>'Objectifs')) !!}
</div>

<div class="form-group">
    {!! Form::label('Contrainte particulière eventuelles et informations complèmentaires') !!}
    {!! Form::textarea('contrainte', null,
        array('required',
              'class'=>'form-control',
              'placeholder'=>'Contraites, informations')) !!}
</div>


<div class="form-group">
    {!! Form::submit('Envoyer le projet',
      array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}