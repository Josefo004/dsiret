<div class="card">
    <div class="card-header">
        <strong>{{ $titulo }}</strong>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>DESCRIPCION</th>
                        <th>PORCENTAJE</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lista as $item)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $item->descripcion }}</td>
                            <td>{{ number_format($item->porcentaje, 2) }} %</td>
                            <td>{{ $item->total }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <th>
                        <td colspan="2" align="right"><strong>SUMATORIA</strong></td>
                        <td> <strong>{{ $total }}</strong> </td>
                    </th>
                </tfoot>
            </table>
        </div>
    </div>
</div>
