<!-- Ilustrable Id Field -->
{!! Form::hidden('comentable_id', Request::get('id') , ['class' => 'form-control']) !!}

<!-- Ilustrable Type Field -->
    {!! Form::hidden('comentable_type', Request::get('type'), ['class' => 'form-control']) !!}

<!-- Ilustrable Type Field -->
    {!! Form::hidden('back', Request::get('back'), ['class' => 'form-control']) !!}


<!-- Comentario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('comentario', 'Comentario:') !!}
    {!! Form::text('comentario', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ url(Request::get('back')) }}" class="btn btn-default">Cancel</a>
</div>



