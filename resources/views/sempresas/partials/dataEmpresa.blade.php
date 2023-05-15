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
                                {{-- <tr>
                                    <th>Numero ROE</th>
                                    <td>: <small>{{ $empresa->nro_roe }}</small></td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><strong>Datos del Responsable Legal</strong></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>Numero Documento</th>
                                    <td>: <small>{{ $empresa->person->nro_documento }}</small></td>
                                </tr>
                                <tr>
                                    <th>Expedido</th>
                                    <td>: <small>{{ $empresa->person->department->dep_descripcion }}</small></td>
                                </tr>
                                <tr>
                                    <th>Sexo</th>
                                    <td>: <small>{{ $empresa->person->gender->gen_descripcion }}</small></td>
                                </tr>
                                <tr>
                                    <th>Telefono del Responsable</th>
                                    <td>: <small>{{  $empresa->person->nro_celular }}</small></td>
                                </tr>
                                <tr>
                                    <th>Apellido Paterno</th>
                                    <td>: <small>{{ $empresa->person->paterno }}</small></td>
                                </tr>
                                <tr>
                                    <th>Apellido Materno</th>
                                    <td>: <small>{{ $empresa->person->materno }}</small></td>
                                </tr>
                                <tr>
                                    <th>Nombres</th>
                                    <td>: <small>{{ $empresa->person->nombres }}</small></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
