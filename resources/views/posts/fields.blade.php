<!-- Titulo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titulo', 'Titulo:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
</div>

<!-- Subtitulo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subtitulo', 'Subtitulo:') !!}
    {!! Form::text('subtitulo', null, ['class' => 'form-control']) !!}
</div>

<!-- Contenido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contenido', 'Contenido:') !!}
    {!! Form::text('contenido', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usuario_id', 'Usuario:') !!}
    {!! Form::select('usuario_id', $usuarios, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Privacidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('privacidad_id', 'Privacidad:') !!}
    {!! Form::select('privacidad_id', $privacidads, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Estado Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado_id', 'Estado Id:') !!}
    {!! Form::select('estado_id', $estados, null, ['class' => 'form-control custom-select']) !!}
</div>
