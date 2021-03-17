<!-- Seguido Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('seguido_id', 'Seguido Id:') !!}
    {!! Form::select('seguido_id', $usuarios, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Seguidor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('seguidor_id', 'Seguidor Id:') !!}
    {!! Form::select('seguidor_id', $usuarios, null, ['class' => 'form-control custom-select']) !!}
</div>
