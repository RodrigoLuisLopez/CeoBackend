<div class="table-responsive">
    <table class="table" id="alcances-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Descripcion</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($alcances as $alcance)
            <tr>
                <td>{{ $alcance->nombre }}</td>
            <td>{{ $alcance->descripcion }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['alcances.destroy', $alcance->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('alcances.show', [$alcance->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('alcances.edit', [$alcance->id]) }}" class='btn btn-default btn-xs'>
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
{{ $alcances->render() }}
