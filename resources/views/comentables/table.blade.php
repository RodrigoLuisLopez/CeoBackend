<div class="table-responsive">
    <table class="table" id="comentables-table">
        <thead>
            <tr>
                <th>Comentable Id</th>
        <th>Comentable Type</th>
        <th>Comentario</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($comentables as $comentable)
            <tr>
                <td>{{ $comentable->comentable_id }}</td>
            <td>{{ $comentable->comentable_type }}</td>
            <td>{{ $comentable->comentario }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['comentables.destroy', $comentable->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('comentables.show', [$comentable->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('comentables.edit', [$comentable->id]) }}" class='btn btn-default btn-xs'>
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
{{ $comentables->render() }}
