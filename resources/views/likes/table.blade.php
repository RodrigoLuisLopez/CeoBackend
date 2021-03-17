<div class="table-responsive">
    <table class="table" id="likes-table">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Post</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($likes as $like)
            <tr>
                <td>{{ $like->usuario->nombre }}</td>
                <td>{{ $like->post->titulo }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['likes.destroy', $like->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('likes.show', [$like->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('likes.edit', [$like->id]) }}" class='btn btn-default btn-xs'>
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
{{ $likes->render() }}