<div class="table-responsive">
    <table class="table" id="areas-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Descripcion</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($areas as $area)
            <tr>
                <td>{{ $area->nombre }}</td>
            <td>{{ $area->descripcion }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['areas.destroy', $area->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('areas.show', [$area->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('areas.edit', [$area->id]) }}" class='btn btn-default btn-xs'>
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
