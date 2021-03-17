<div class="table-responsive">
    <table class="table" id="privacidads-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Descripcion</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($privacidads as $privacidad)
            <tr>
                <td>{{ $privacidad->nombre }}</td>
            <td>{{ $privacidad->descripcion }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['privacidads.destroy', $privacidad->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('privacidads.show', [$privacidad->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('privacidads.edit', [$privacidad->id]) }}" class='btn btn-default btn-xs'>
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
{{ $privacidads->render() }}