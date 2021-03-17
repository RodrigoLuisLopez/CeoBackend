@extends('layouts.app')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Post Details</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right" href="{{ route('posts.index') }}">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    @include('posts.show_fields')
                </div>
            </div>

        </div>
    </div>


    <div class="content px-3" style="float: left; width: 50%;">

        <div class="content">
            <div class="card">
                <div class="card-body">
                    <div class="row" style="padding-left: 20px">
                        <div class="conteiner">

                            <a href="{{ route('posts.index') }}" class="btn btn-default">Regresar</a>
                            <a
                                href="{{ route('comentables.create', ['id' => $post->id, 'type' => 'Post', 'back' => Request::path()]) }}"><button
                                    class="btn btn-primary btn-md">Agregar Comentario</button></a>

                        </div>

                        <table class="table" style="margin-top:100px">

                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Comentarios</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comentarios as $comentario)
                                    <tr>
                                        <td>{{ $comentario->id }}</td>
                                        <td>{{ $comentario->comentario }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $comentarios->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content px-3" style="float: left; width: 50%;">

        <div class="content">
            <div class="card">
                <div class="card-body">
                    <div class="row" style="padding-left: 20px">
                        <div class="conteiner">

                            <a href="{{ route('posts.index') }}" class="btn btn-default">Regresar</a>
                            <a
                                href="{{ route('ilustrables.create', ['id' => $post->id, 'type' => 'Post', 'back' => Request::path()]) }}"><button
                                    class="btn btn-primary btn-md">Agregar Imagen</button></a>

                        </div>

                        <table class="table" style="margin-top:100px">

                            <thead>
                                <tr>
                                    <th>Imagen id</th>
                                    <th>Imagen</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($imagenes as $imagen)
                                    <tr>
                                        <td>{{ $imagen->id }}</td>
                                        <td>
                                            <img src="{{ $imagen->url }}" alt="" width="80px">
                                        </td>
                                        <td>

                                            {!! Form::open(['route' => ['ilustrables.destroy', $imagen->id], 'method' => 'delete']) !!}
                                            {!! Form::hidden('back', Request::path(), ['class' => 'form-control']) !!}

                                            {!! Form::button('Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Seguro que quiere borrar esta Imagen?')"]) !!}
                                            {!! Form::close() !!}

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $imagenes->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
