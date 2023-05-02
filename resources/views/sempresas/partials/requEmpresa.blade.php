<div class="container">
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="javascript: history.go(-1)" class="btn btn-info"> Volver Atrás</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><strong>Datos de la Empresa</strong></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>Municipio</th>
                                    <td>: <small>{{ $empresa->municipio->mun_descripcion }}</small></td>
                                </tr>
                                <tr>
                                    <th>Actividad Economica</th>
                                    <td>: <small>{{ $empresa->eactividade->act_descripcion }}</small></td>
                                </tr>
                                <tr>
                                    <th>Regimen Impositivo</th>
                                    <td>: <small>{{ $empresa->regime->reg_descripcion }}</small></td>
                                </tr>
                                <tr>
                                    <th>Dirección</th>
                                    <td>: <small>{{ $empresa->emp_direccion }}</small></td>
                                </tr>
                                <tr>
                                    <th>Telefono de la Empresa</th>
                                    <td>: <small>{{ $empresa->emp_telefono }}</small></td>
                                </tr>
                                <tr>
                                    <th>Razon Social</th>
                                    <td>: <small>{{ $empresa->razon_social }}</small></td>
                                </tr>
                                <tr>
                                    <th>NIT</th>
                                    <td>: <small>{{ $empresa->NIT }}</small></td>
                                </tr>
                                <tr>
                                    <th>Numero ROE</th>
                                    <td>: <small>{{ $empresa->nro_roe }}</small></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><strong>Requerimientos</strong></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Requerimiento</th>
                                    <th>Cantidad</th>
                                    <th>Ver</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($requerimientos as $item)
                                    <tr>
                                        <td>{{ $item->profession->pro_descripcion }}</td>
                                        <td>{{ $item->cantidad }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
