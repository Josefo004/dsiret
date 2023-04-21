<x-layouts.app>

<div class="container mb-5">
    <nav class="navbar" style="background-color: #FFA500;">
        <div class="container-fluid">
            <span class="navbar-brand">SIRET</span>
        </div>
    </nav>
    <div class="container text-lg-start ">
        <div class="row">
            <div class="col-md-12 text-center mt-2">
                <h2>FORMULARIO REGISTRADO</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="/index" class="btn btn-info"> Volver Atrás</a>
            </div>
        </div>
        <div class="card bg-glass">
          <div class="card-body">
            <div class="row">
                <div class ="col-md-3 text-center ">
                    <img src="{{ asset('images/logo1_1.png') }}" class="img-fluid" alt="">
                </div>
                <div class ="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 text-left">
                                <h4><strong>Nombre:  </strong></h4>
                            </div>
                            <div class="col-md-8 text-left">
                                <h4>{{ $person->nombres }} {{ $person->paterno }} {{ $person->materno }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 text-left">
                            <h4><strong>Sexo: </strong></h4>
                            </div>
                            <div class="col-md-8 text-left">
                                <h4> {{$person->gender->gen_descripcion}} </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 text-left">
                            <h4><strong>Carnet de Identidad: </strong></h4>
                            </div>
                            <div class="col-md-8 text-left">
                                <h4>{{$person->nro_documento}} {{$person->department->dep_codigo}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 text-left">
                            <h4><strong>Fecha de nacimiento:  </strong></h4>
                            </div>
                            <div class="col-md-8 text-left">
                                <h4>{{ date('d-m-Y',strtotime($person->fecha_nac)) }} <strong>Edad: </strong> {{$person->edad}} años</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 text-left">
                            <h4><strong>Celular:  </strong></h4>
                            </div>
                            <div class="col-md-8 text-left">
                                <h4>{{$person->nro_celular}}</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 text-left">
                            <h4><strong>Direccion:  </strong></h4>
                            </div>
                            <div class="col-md-8 text-left">
                                <h4> {{$person->direccion}} </h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 text-left">
                            <h4><strong>Correo Electronico:  </strong></h4>
                            </div>
                            <div class="col-md-8 text-left">
                                <h4> {{$person->email}} </h4>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 text-left">
                            <h4><strong>Formacion Academica:  </strong></h4>
                            </div>
                        <div class="col-md-8 text-left">
                            <h4>{{$f->record->for_descripcion}} </h4>
                        </div>

                    </div>
                    <hr>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <strong><h3>Idiomas</h3></strong>
                                <ul class="list-group">
                                    @foreach ($f->languages as $item )
                                        <li class="list-group-item">
                                            <input class="form-check-input me-1" type="checkbox" value=""  checked id="firstCheckbox">
                                            <label class="form-check-label" for="firstCheckbox">{{ $item->descripcion }}</label>
                                        </li>
                                    @endforeach
                                </ul>

                            </div>
                            <div class="col-md-6 text-left">
                                <strong> <h3>Profesiones/Ocupaciones</h3></strong>
                                <ul class="list-group">
                                    @foreach ($f->professions as $item )
                                        <li class="list-group-item">
                                            <input class="form-check-input me-1" type="checkbox" value=""  checked id="firstCheckbox">
                                            <label class="form-check-label" for="firstCheckbox">{{ $item->pro_descripcion }}</label>
                                        </li>

                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <small>Registrado en: {{ date('d-m-Y H:m:s',strtotime($person->created_at)) }}</small>
            </div>
          </div>
        </div>
    </div>
</div>

</x-layouts.app>
