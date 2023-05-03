<div class="container">
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="javascript: history.go(-1)" class="btn btn-info"> Volver Atrás</a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><strong>Datos de la Empresa</strong></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <th>Direcion y Razon Social</th>
                                        <td>: {{ $sempresa->municipio->mun_descripcion }}, {{ $sempresa->emp_direccion }} </td>
                                    </tr>
                                    <tr>
                                        <th>NIT, Telefno</th>
                                        <td>: {{ $sempresa->NIT }} | {{ $sempresa->emp_telefono }} </td>
                                    </tr>
                                    <tr>
                                        <th>Responsable</th>
                                        <td>: {{ $sempresa->person->paterno }} {{ $sempresa->person->materno }} {{ $sempresa->person->nombres }} ({{ $sempresa->person->nro_celular }}) </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><strong>Datos del Requerimiento</strong></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <th>ID Requerimento</th>
                                        <td>: {{ $requerimiento->id }} </td>
                                    </tr>
                                    <tr>
                                        <th>Requerimiento</th>
                                        <td>: {{ $requerimiento->profession->pro_descripcion }} </td>
                                    </tr>
                                    <tr>
                                        <th>Cantidad</th>
                                        <td>: {{ $requerimiento->cantidad }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><strong>CANDIDATOS QUE CUMPLEN CON EL REQUERIMIENTO "{{ $requerimiento->profession->pro_descripcion }}"</strong> </div>
                    <div class="card-body">
                        @if(count($candidatos)>0)
                            <div class="table-responsive">
                                <table class="table table-responsive table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th><small>ID Form.</small></th>
                                            <th><small>CI</small></th>
                                            <th><small>Nombre Completo</small></th>
                                            <th><small>Sexo</small></th>
                                            <th><small>Fecha Nac.</small></th>
                                            <th><small>Edad</small></th>
                                            <th><small>Celular</small></th>
                                            <th><small>Niv. Academico</small></th>
                                            <th><small>Idiomas</small></th>
                                            <th><small>Profeciones</small></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($candidatos as $candidato )
                                        <tr>
                                            <td> <small>{{ $candidato->forms->id }}</small> </td>
                                            <td> <small>{{ $candidato->nro_documento }} {{ $candidato->department->dep_codigo }}</small> </td>
                                            <td> <small>{{ $candidato->paterno }} {{ $candidato->manterno }} {{ $candidato->nombres }}</small> </td>
                                            <td> <small>{{ $candidato->gender->gen_descripcion }}</small> </td>
                                            <td> <small>{{ date('d-m-Y',strtotime($candidato->fecha_nac)) }}</small> </td>
                                            <td> <small>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($candidato->fecha_nac))->age }}</small> </td>
                                            <td> <small>{{ $candidato->nro_celular }}</small> </td>
                                            <td> <small>{{ $candidato->forms->record->for_descripcion }}</small> </td>
                                            <td>
                                                <small>
                                                    <ul>
                                                        @foreach ($candidato->forms->languages as $idioma )
                                                            <li>{{ $idioma->descripcion }}</li>
                                                        @endforeach
                                                    </ul>
                                                </small>
                                            </td>
                                            <td>
                                                <small>
                                                    <ul>
                                                        @foreach ($candidato->forms->professions as $profesion )
                                                            <li>{{ $profesion->pro_descripcion }}</li>
                                                        @endforeach
                                                    </ul>
                                                </small>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <h3>NO HAY RESULTADOS</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
