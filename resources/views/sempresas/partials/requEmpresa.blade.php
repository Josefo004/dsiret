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
                <div class="card-header"><strong>Requerimientos</strong></div>
                <div class="card-body">
                    <div class="table-responsive">
                        @if(count($requerimientos) > 0)
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Profesiones / ocupaciones</th>
                                        <th>Cantidad</th>
                                        <th>Ver</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requerimientos as $item)
                                        <tr>
                                            <td>{{ $item->profession->pro_descripcion }}</td>
                                            <td>{{ $item->cantidad }}</td>
                                            <td><a href="{{ route("sempresasEliminarRequerimiento", $item->id )}}"><i class='fa fa-trash'></i></a> | <a href="{{ route("sempresasBuscarRequerimiento", $item->id )}}"><i class='fa fa-search'></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                        <div class="card">
                            <div class="card-header"><strong>Nuevo Requerimiento</strong></div>
                            <div class="card-body">
                                {!! Form::open(['route' => 'sempresasNuevoRequerimiento', 'autocomplete'=>'off']) !!}
                                    @csrf
                                    <input id="sempresa_id" name="sempresa_id" type="hidden" value="{{ $empresa->id }}">
                                    <div class="row">
                                        <div class="form-group col-md-8">
                                            {{ Form::label('profession_id','Profesiones') }}
                                            {{ Form::select('profession_id', $profesions, null,[ 'class'=>'form-control js-example-basic-multiple', 'required'=>'required' ]) }}
                                            @error('profession_id')
                                                <br><small class="text-danger">*{{$message}}</small><br>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            {{ Form::label('cantidad', 'Cantidad') }}
                                            {{ Form::number('cantidad',null,[ 'type'=>'number', 'class'=> 'form-control', 'maxlength'=>'20', 'pattern'=>'[0-9]+']) }}
                                            @error('cantidad')
                                                <small class="text-danger">*{{$message}}</small><br>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-1">
                                            {{ Form::label('', '.') }}
                                            {{ Form::submit('+', ['class'=>'btn btn-primary']) }}
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
