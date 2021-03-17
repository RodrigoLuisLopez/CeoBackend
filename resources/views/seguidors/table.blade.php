<div class="table-responsive">
    <table class="table" id="seguidors-table">
        <thead>
            <tr>
                <th>Seguido </th>
                <th>Seguidor </th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($seguidors as $seguidor)
            <tr>
                <td>{{ $seguidor->seguido->nombre }}</td>
                <td>{{ $seguidor->seguidor->nombre }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['seguidors.destroy', $seguidor->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('seguidors.show', [$seguidor->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('seguidors.edit', [$seguidor->id]) }}" class='btn btn-default btn-xs'>
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
{{ $seguidors->render() }}
