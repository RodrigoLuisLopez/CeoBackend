
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Titulo Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Subtitulo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('edad', 'Edad:') !!}
    {!! Form::text('edad', null, ['class' => 'form-control']) !!}
</div>

<!-- Contenido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion', 'Direccion:') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('telefono', 'Telefono:') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('facebook', 'Facebook:') !!}
    {!! Form::text('facebook', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('twiter', 'Twiter:') !!}
    {!! Form::text('twiter', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('instagram', 'Instagram:') !!}
    {!! Form::text('instagram', null, ['class' => 'form-control']) !!}
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



<div class="form-group col-sm-6">
    {!! Form::label('biografia', 'Biografia:') !!}
    {!! Form::textarea('biografia', null, ['class' => 'form-control']) !!}
</div>

