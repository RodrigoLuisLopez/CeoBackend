<div class="table-responsive">
    <table class="table" id="estados-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Descripcion</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($estados as $estado)
            <tr>
                <td>{{ $estado->nombre }}</td>
            <td>{{ $estado->descripcion }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['estados.destroy', $estado->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('estados.show', [$estado->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('estados.edit', [$estado->id]) }}" class='btn btn-default btn-xs'>
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
{{ $estados->render() }}