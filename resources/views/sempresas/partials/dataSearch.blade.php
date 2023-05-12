<div class="container">
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="javascript: history.go(-1)" class="btn btn-info"> Volver Atrás</a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header"><strong>Datos de la Empresa</strong></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <th>Direcion y Razon Social</th>
                                        <td>: {{ $sempresa->municipio->mun_descripcion }}, {{ $sempresa->emp_direccion }} | {{ $sempresa->razon_social }}</td>
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
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header"><strong>Datos del Requerimiento</strong></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <th>ID Req.</th>
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
                    <div class="card-header"><strong>CANDIDATOS QUE CUMPLEN CON EL REQUERIMIENTO "{{ $requerimiento->profession->pro_descripcion }}" {{ count($candidatos) }}</strong>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" onclick="seleccion(this);">
                            <label class="form-check-label"><small>SELECCIONAR TODOS.</small></label>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(count($candidatos)>0)
                        {!! Form::open(['route' => 'fpdf.seleccionados', 'autocomplete'=>'off', 'target'=>'_blank', 'name'=>'formulario']) !!}
                            @csrf
                            <input id="requerimiento_id" name="requerimiento_id" type="hidden" value="{{ $requerimiento->id }}">
                            <div class="table-responsive">
                                <table class="table table-responsive table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                <small>ID FM.</small>
                                            </th>
                                            <th><small>CI</small></th>
                                            <th><small>Nombre Completo</small></th>
                                            <th><small>Sexo</small></th>
                                            <th><small>Fecha Nac.</small></th>
                                            <th><small>Edad</small></th>
                                            <th><small>Celular</small></th>
                                            <th><small>Niv. Academico</small></th>
                                            <th><small>Idiomas</small></th>
                                            <th><small>Profeciones</small></th>
                                            <th><small>Registrado en</small></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($candidatos as $key => $candidato )
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" name="seleccionados[]" value="{{ $candidato->forms->id }}">
                                                    <label class="form-check-label" for="seleccionados[]"><small>{{ $candidato->forms->id }}</small></label>
                                                </div>
                                            </td>
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
                                            <td> <small>{{ date('d-m-Y H:m',strtotime($candidato->forms->created_at)) }}</small> </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="form-group text-center">
                                    {{ Form::submit('IMPRIMIR', ['class'=>'btn btn-primary']) }}
                                    <a href="{{ route('sempresas.index') }}" class="btn btn-danger">CANCELAR</a>
                                </div>
                            </div>
                        {!! Form::close() !!}
                        @else
                            <h3>NO HAY RESULTADOS</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function seleccion(vc) {
        for (let i = 0; i < document.formulario.elements.length; i++) {
            if (document.formulario.elements[i].type === "checkbox") {
                document.formulario.elements[i].checked = !document.formulario.elements[i].checked;
            }
        }
    }
</script>
