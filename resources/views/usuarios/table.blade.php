<div class="table-responsive">
    <table class="table" id="usuarios-table">
        <thead>
            <tr>
            <th>Nombre</th>
            <th>Foto</th>
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
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($usuarios as $usuario)
            <tr>
            <td>{{ $usuario->nombre }}</td>
 
            @if ($usuario->fotousuario)
                <td><img src="{{ $usuario->fotousuario->url }}" alt="" width="60px"></td>                
            @else
                <td><img src=" {{ asset('userdefaultimg.png') }}" alt="" width="60px"></td>                
            @endif
 
            <td>{{ $usuario->edad }}</td>
            <td>{{ substr($usuario->direccion, 0,13) }}...</td>
            <td>{{ $usuario->correo }}</td>
            <td>{{ $usuario->telefono }}</td>
            <td>{{ substr($usuario->biografia, 0,13) }}...</td>
            <td>{{ $usuario->facebook }}</td>
            <td>{{ $usuario->twitter }}</td>
            <td>{{ $usuario->instagram }}</td>
            <td>{{ $usuario->estado->nombre }}</td>
            <td>{{ $usuario->privacidad->nombre }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['usuarios.destroy', $usuario->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('usuarios.show', [$usuario->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('usuarios.edit', [$usuario->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
{{ $usuarios->render() }}
