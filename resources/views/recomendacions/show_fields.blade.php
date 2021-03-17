<!-- Nota Field -->
<div class="col-sm-12">
    {!! Form::label('nota', 'Nota:') !!}
    <p>{{ $recomendacion->nota }}</p>
</div>

<!-- Recomendador Id Field -->
<div class="col-sm-12">
    {!! Form::label('recomendador_id', 'Recomendador Id:') !!}
    <p>{{ $recomendacion->recomendador_id }}</p>
</div>

<!-- Recomendado Id Field -->
<div class="col-sm-12">
    {!! Form::label('recomendado_id', 'Recomendado Id:') !!}
    <p>{{ $recomendacion->recomendado_id }}</p>
</div>

<!-- Alcance Id Field -->
<div class="col-sm-12">
    {!! Form::label('alcance_id', 'Alcance Id:') !!}
    <p>{{ $recomendacion->alcance_id }}</p>
</div>

<!-- Giro Id Field -->
<div class="col-sm-12">
    {!! Form::label('giro_id', 'Giro Id:') !!}
    <p>{{ $recomendacion->giro_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $recomendacion->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $recomendacion->updated_at }}</p>
</div>

