<!-- Seguido Id Field -->
<div class="col-sm-12">
    {!! Form::label('seguido_id', 'Seguido Id:') !!}
    <p>{{ $seguidor->seguido->name }}</p>
</div>

<!-- Seguidor Id Field -->
<div class="col-sm-12">
    {!! Form::label('seguidor_id', 'Seguidor Id:') !!}
    <p>{{ $seguidor->seguidor->name }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $seguidor->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $seguidor->updated_at }}</p>
</div>

