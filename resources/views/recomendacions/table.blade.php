<div class="table-responsive">
    <table class="table" id="recomendacions-table">
        <thead>
            <tr>
                <th>Nota</th>
        <th>Recomendador</th>
        <th>Recomendado</th>
        <th>Alcance</th>
        <th>Giro</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($recomendacions as $recomendacion)
            <tr>
                <td>{{ $recomendacion->nota }}</td>
            <td>{{ $recomendacion->recomendador->nombre }}</td>
            <td>{{ $recomendacion->recomendado->nombre }}</td>
            <td>{{ $recomendacion->alcance->nombre }}</td>
            <td>{{ $recomendacion->giro->nombre }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['recomendacions.destroy', $recomendacion->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('recomendacions.show', [$recomendacion->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('recomendacions.edit', [$recomendacion->id]) }}" class='btn btn-default btn-xs'>
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
{{ $recomendacions->render() }}
