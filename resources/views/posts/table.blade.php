<div class="table-responsive">
    <table class="table" id="posts-table">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Subtitulo</th>
                <th>Contenido</th>
                <th>Usuario</th>
                <th>Privacidad</th>
                <th>Estado</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->titulo }}</td>
                    @if ($post->fotopost)
                        <td><img src="{{ $post->fotopost->url }}" alt="" width="60px"></td>
                    @else
                        <td><img src=" {{ asset('userdefaultimg.png') }}" alt="" width="60px"></td>
                    @endif

                    <td>{{ $post->subtitulo }}</td>
                    <td>{{ substr($post->contenido, 0, 13) }}...</td>
                    <td>{{ $post->usuario->name }}</td>
                    <td>{{ $post->privacidad->nombre }}</td>
                    <td>{{ $post->estado->nombre }}</td>
                    <td width="120">
                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('posts.show', [$post->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('posts.edit', [$post->id]) }}" class='btn btn-default btn-xs'>
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
{{ $posts->render() }}
