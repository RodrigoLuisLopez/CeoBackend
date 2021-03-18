<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
            <tr>
                <th>name</th>
                <th>imagen</th>
                <th>email</th>
                <th>edad</th>
                <th>direccion</th>
                <th>telefono</th>
                <th>biografia</th>
                <th>facebook</th>
                <th>twiter</th>
                <th>instagram</th>
                <th>estado</th>
                <th>privacidad</th>
                
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    @if ($user->fotouser)
                        <td><img src="{{ $user->fotouser->url }}" alt="" width="60px"></td>
                    @else
                        <td><img src=" {{ asset('userdefaultimg.png') }}" alt="" width="60px"></td>
                    @endif

                    <td>{{ $user->email }}</td>
                    <td>{{ $user->edad }}</td>
                    <td>{{ $user->direccion }}</td>
                    <td>{{ $user->telefono }}</td>
                    <td>{{ substr($user->biografia, 0, 13) }}...</td>
                    <td>{{ $user->facebook }}</td>
                    <td>{{ $user->twiter }}</td>
                    <td>{{ $user->instagram }}</td>
                    <td>{{ $user->estado->nombre }}</td>
                    <td>{{ $user->privacidad->nombre }}</td>
                    <td width="120">
                        {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('users.show', [$user->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('users.edit', [$user->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {{-- {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} --}}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $users->render() }}
