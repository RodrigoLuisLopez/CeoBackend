<div class="table-responsive">
    <table class="table" id="giros-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Descripcion</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($giros as $giro)
            <tr>
                <td>{{ $giro->nombre }}</td>
            <td>{{ $giro->descripcion }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['giros.destroy', $giro->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('giros.show', [$giro->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('giros.edit', [$giro->id]) }}" class='btn btn-default btn-xs'>
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
{{ $giros->render() }}
