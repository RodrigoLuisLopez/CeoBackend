
    <table class="table" id="users-table">
        <thead>
            <tr>
                <th>name</th>
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
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{ $user->name }}</td>
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
                    
                </tr>
        </tbody>
    </table>


