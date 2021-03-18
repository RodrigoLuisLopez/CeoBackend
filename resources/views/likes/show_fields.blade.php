<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $like->usuario->name }}</p>
</div>

<!-- Post Id Field -->
<div class="col-sm-12">
    {!! Form::label('post_id', 'Post Id:') !!}
    <p>{{ $like->post_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $like->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $like->updated_at }}</p>
</div>

