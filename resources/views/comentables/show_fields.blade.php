<!-- Comentable Id Field -->
<div class="col-sm-12">
    {!! Form::label('comentable_id', 'Comentable Id:') !!}
    <p>{{ $comentable->comentable_id }}</p>
</div>

<!-- Comentable Type Field -->
<div class="col-sm-12">
    {!! Form::label('comentable_type', 'Comentable Type:') !!}
    <p>{{ $comentable->comentable_type }}</p>
</div>

<!-- Comentario Field -->
<div class="col-sm-12">
    {!! Form::label('comentario', 'Comentario:') !!}
    <p>{{ $comentable->comentario }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $comentable->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $comentable->updated_at }}</p>
</div>

