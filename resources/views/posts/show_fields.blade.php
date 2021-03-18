<table class="table" id="posts-table">
    <thead>
        <tr>
            <th>Titulo</th>
    <th>Subtitulo</th>
    <th>Contenido</th>
    <th>Usuario</th>
    <th>Privacidad</th>
    <th>Estado</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $post->titulo }}</td>
        <td>{{ $post->subtitulo }}</td>
        <td>{{ $post->contenido }}</td>
        <td>{{ $post->usuario->name }}</td>
        <td>{{ $post->privacidad->nombre }}</td>
        <td>{{ $post->estado->nombre }}</td>
        </tr>
    </tbody>
</table>

