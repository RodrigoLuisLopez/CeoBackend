@extends('cliente.root')

@section('cuerpo')



    {!! Form::open(['route' => 'blog.store'], ['class' => 'form-material']) !!}

    <div class="card-body b-b">
        
        <h2 >Nuevo post</h2>

        <!-- Titulo Field -->
        <div class="form-group col-sm-6">
            {!! Form::text('titulo', null, ['class' => 'form-control form-control-lg r-30', 'placeholder'=>" Titulo"]) !!}
        </div>

        <!-- Subtitulo Field -->
        <div class="form-group col-sm-6">
            {!! Form::text('subtitulo', null, ['class' => 'form-control form-control-lg r-30', 'placeholder'=>" Subtitulo"]) !!}
        </div>


        <!-- Privacidad Id Field -->
        <div class="form-group col-sm-6">
            {!! Form::select('privacidad_id', $privacidads, null, ['class' => 'form-control form-control-lg r-30']) !!}
        </div>


        <!-- Estado Id Field -->
        <div class="form-group col-sm-6">
            {!! Form::select('estado_id', $estados, null, ['class' => 'form-control form-control-lg r-30']) !!}
        </div>

        

        <!-- Contenido Field -->
        <div class="form-group col-sm-6">
            {!! Form::textarea('contenido', null, ['class' => 'form-control form-control-lg r-30', 'placeholder'=>" Contenido"]) !!}
        </div>

        <!-- User Id Field -->
        {!! Form::hidden('usuario_id', Auth::user()->id, null, ['class' => 'form-control form-control-lg r-30']) !!}
        {!! Form::hidden('back', Request::path(), ['class' => 'form-control']) !!}


        <div class="card-footer">
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('blog.index') }}" class="btn btn-default">Cancelar</a>
        </div>
    </div>
    {!! Form::close() !!}














@endsection
