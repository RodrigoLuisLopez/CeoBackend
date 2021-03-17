<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $usuarios->nombre }}</p>
</div>

<table class="table" id="usuarios-table">
    <thead>
        <tr>
    <th>Edad</th>
    <th>Direccion</th>
    <th>Correo</th>
    <th>Telefono</th>
    <th>Biografia</th>
    <th>Facebook</th>
    <th>Twitter</th>
    <th>Instagram</th>
    <th>Estado</th>
    <th>Privacidad</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td>{{ $usuarios->edad }}</td>
        <td>{{ substr($usuarios->direccion, 0,7) }}...</td>
        <td>{{ $usuarios->correo }}</td>
        <td>{{ $usuarios->telefono }}</td>
        <td>{{ substr($usuarios->biografia, 0,7) }}...</td>
        <td>{{ $usuarios->facebook }}</td>
        <td>{{ $usuarios->twitter }}</td>
        <td>{{ $usuarios->instagram }}</td>
        <td>{{ $usuarios->estado->nombre }}</td>
        <td>{{ $usuarios->privacidad->nombre }}</td>
        </tr>
    </tbody>
</table>

<div class="conteiner">    
    
    <a href="{{ route('usuarios.index') }}" class="btn btn-default">Regresar</a>
    <a href="{{ route('ilustrables.create', ['id'=>$usuarios->id, 'type'=>'Usuarios', 'back'=>Request::path() ]) }}"><button class="btn btn-primary btn-md">Agregar Imagen</button></a>

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
    
                    {!! Form::open(['route' => ['ilustrables.destroy', $imagen->id], 'method' =>'delete']) !!}
                    {!! Form::hidden('back', Request::path(), ['class' => 'form-control']) !!}
    
                    {!! Form::button('Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger',
                    'onclick' => "return confirm('Seguro que quiere borrar esta Imagen?')"]) !!}
                    {!! Form::close() !!}

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $imagenes->render() }}
