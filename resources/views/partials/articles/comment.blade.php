{!! Form::open(['route' => 'articles.store', 'method' => 'POST']) !!}	
	<div class="form-group">
        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
    </div>
	<input type="hidden" name="type" value="comments" />
	<input type="hidden" name="id" value="{{ $id_post }}" />

    {!! Form::submit('Envoyer un commentaire', ['class' => 'btn btn-block']) !!}
@include('partials.articles.errors')