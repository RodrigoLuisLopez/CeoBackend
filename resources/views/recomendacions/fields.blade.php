<!-- Nota Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nota', 'Nota:') !!}
    {!! Form::text('nota', null, ['class' => 'form-control']) !!}
</div>

<!-- Recomendador Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('recomendador_id', 'Recomendador Id:') !!}
    {!! Form::select('recomendador_id', $usuarios, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Recomendado Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('recomendado_id', 'Recomendado Id:') !!}
    {!! Form::select('recomendado_id', $usuarios, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Alcance Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alcance_id', 'Alcance Id:') !!}
    {!! Form::select('alcance_id', $alcances, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Giro Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('giro_id', 'Giro Id:') !!}
    {!! Form::select('giro_id', $giros, null, ['class' => 'form-control custom-select']) !!}
</div>
