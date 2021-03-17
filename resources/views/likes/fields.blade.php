<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usuario_id', 'Usuario:') !!}
    {!! Form::select('usuario_id', $usuarios, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Post Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('post_id', 'Post:') !!}
    {!! Form::select('post_id', $posts, null, ['class' => 'form-control custom-select']) !!}
</div>
