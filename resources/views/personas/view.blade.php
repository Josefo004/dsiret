@extends('adminlte::page')

@section('title', 'Siret')

@section('content_header')
<x-encabezado-pagina
	icono="fa fa-bank"
	titulo="SIRET"
	subtitulo="Sistema Informatico de Registro de Empleo Temporal"
    modoTitulo='L'>
    {{-- {{ Breadcrumbs::render('forms/index') }} --}}
</x-encabezado-pagina>
@stop
<link rel="stylesheet" href="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/css/dist/mdb5/standard/core.min.css">

<link rel="stylesheet" media="all" href="../../web/css/style.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@section('content')

{{-- {{ session('status') }} --}}

<div class="container text-center text-lg-start ">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Formulario de Registro</h2>
        </div>
    </div>

    {{-- <div class="row align-items-center">

        <div class="card bg-glass">
          <div class="card-body">
            <div class="row">
                <div class ="col-md-3">
                    <img src="../images/logo_app_gadch.png" alt="">
                </div>
                <div class ="col-md-9">


                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 text-right">
                                <h4><strong>Nombre:  </strong></h4>
                            </div>
                            <div class="col-md-8">
                                <h4>{{ $person->nombres }} {{ $person->paterno }} {{ $person->materno }} </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 text-right">
                            <h4><strong>Sexo: </strong></h4>
                            </div>
                            <div class="col-md-8">
                                <h4> ??? </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 text-right">
                            <h4><strong>Carnet de Identidad: </strong></h4>
                            </div>
                            <div class="col-md-8">
                                <h4>{{ $person->nro_documento }} ???</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 text-right">
                            <h4><strong>Fecha de nacimiento:  </strong></h4>
                            </div>
                            <div class="col-md-8">
                                <h4>{{  $person->fecha_nac }} </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 text-right">
                            <h4><strong>Celular:  </strong></h4>
                            </div>
                            <div class="col-md-8">
                                <h4>{{  $person->nro_celular }}</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 text-right">
                            <h4><strong>Direccion:  </strong></h4>
                            </div>
                            <div class="col-md-8">
                                <h4>{{  $person->direccion }}</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 text-right">
                            <h4><strong>Correo Electronico:  </strong></h4>
                            </div>
                            <div class="col-md-8">
                                <h4>{{  $person->email }}</h4>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <u><strong><h3>Idiomas</h3></strong></u>

                                @foreach ( $person->forms as $forma )
                                    @foreach ( $forma->languages as $idiomas )
                                        <h4>{{ $idiomas->descripcion  }}</h4>
                                    @endforeach
                                @endforeach
                            </div>
                            <div class="col-md-6 text-center">
                            <u><h3>Profesiones</h3></u>
                                @foreach ( $person->forms as $forma )
                                    @foreach ( $forma->professions as $idiomas )
                                        <h4>{{ $idiomas->pro_descripcion  }}</h4>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>

                </div>
            </div>




          </div>
        </div>
      </div>




    </div> --}}

</div>



@stop

@section('css')

@stop

@section('js')
<!-- DropZone -->
<script type="text/javascript" src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/js/dist/mdb5/standard/core.min.js"></script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>  -->
<script src="../../web/js/index.js" type="module"></script>

<script>

const variable = () =>{
    var x_incom = document.getElementById("ocultar_nav");
    x_incom.style.display = "none";
}
variable();
</script>
@stop
