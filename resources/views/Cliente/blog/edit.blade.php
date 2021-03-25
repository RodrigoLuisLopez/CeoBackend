@extends('cliente.root')

@section('cuerpo')



    {!! Form::model($post, ['route' => ['blog.update', $post->id], 'method' => 'patch'], ['class' => 'form-material']) !!}

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
        {!! Form::hidden('back', Request::get('back'), ['class' => 'form-control']) !!}


        <div class="card-footer">
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('blog.index') }}" class="btn btn-default">Cancelar</a>
        </div>
    </div>
    {!! Form::close() !!}






@if ($numeroimagenes > 0)

    <table class="table" style="margin-top:100px">
        <tbody>
            @foreach ($imagenes as $imagen)
                <tr>
                    <td>
                        <img src="{{ $imagen->url }}" alt="" width="300px">
                    </td>
                    <td>

                        {!! Form::open(['route' => ['ilustrables.destroy', $imagen->id], 'method' =>
                        'delete']) !!}
                        {!! Form::hidden('back', Request::get('back'), ['class' => 'form-control']) !!}
        
                        {!! Form::button('Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger',
                        'onclick' => "return confirm('Seguro que quiere borrar esta Imagen?')"]) !!}
                        {!! Form::close() !!}

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@else

    {!! Form::open(['route' => 'ilustrables.store', 'files'=>true]) !!}

        <!-- Ilustrable Id Field -->
        {!! Form::hidden('ilustrable_id', Request::get('idd') , ['class' => 'form-control']) !!}

        <!-- Ilustrable Type Field -->
        {!! Form::hidden('ilustrable_type', Request::get('type'), ['class' => 'form-control']) !!}

        <!-- Ilustrable Type Field -->
        {!! Form::hidden('back', Request::get('back'), ['class' => 'form-control']) !!}

        <div class="form-group col-sm-6">
            {!! Form::label('url', 'Nueva Imagen:') !!}
            {!! Form::file('url', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-sm-12">
            <button class="submit button-normal green">Registrar Imagen</button>
        </div>

    {!! Form::close() !!}
    <br><br><br>

@endif


    






@endsection
