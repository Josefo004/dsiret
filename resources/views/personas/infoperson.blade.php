
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="theme-color" content="#33b5e5">


    <link rel="stylesheet" href="{{ asset('web/css/bootstrap.min.css') }}">


    <link rel="stylesheet" media="all" href="{{ asset('web/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/siret.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <title>SIRET</title>


    <meta charset="utf-8">
    <title></title>



</head>
</head>
<nav class="navbar" style="background-color: #FFA500;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        {{-- <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top"> --}}
        SIRET
      </a>
    </div>
  </nav>
  <br>

<body class="container">


<div class="container text-center text-lg-start ">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2>FORMULARIO REGISTRADO</h2>
        </div>
    </div>



        <div class="row">
            <div class="col-md-12 text-right">


                {{-- <form style="display: inline" action="cerrar" method="POST">
                    @csrf
                    <a href="#" class="btn btn-danger" onclick="this.closest('form').submit()">Cerra Session</a>
                </form> --}}
                <a href="/index" class="btn btn-info"> Volver Atrás</a>

            </div>
        </div>
        <div class="row align-items-center">

        <div class="card bg-glass">
          <div class="card-body">
            <div class="row">
                <div class ="col-md-3">
                    <img src="https://siret.chuquisaca.gob.bo/images/logo_app_gadch.png" alt="">
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
                            <h4><strong>Canet de Identidad: </strong></h4>
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
                    <hr>
                </div>
            </div>
            <small>Registrado en: {{ date('d-m-Y H:m:s',strtotime($person->created_at)) }}</small>
            </div>



          </div>
        </div>
      </div>

    </div>

</body>

{{-- @section('content') --}}


{{-- @if (session()->has('0.nro_documento') && session()->has('0.fecha_nac')) --}}

<script>

    const d = new Date();
    const formatoMap = {
        dd: d.getDate(),
        mm: d.getMonth() + 1,
        yy: d.getFullYear().toString().slice(-2),
        yyyy: d.getFullYear()
    }
    const fecha = formatoMap.dd+'-'+ formatoMap.mm+'-'+ formatoMap.yyyy
    const var_min = d.getMinutes()+2;

    if(!localStorage.getItem('var_min') && !localStorage.getItem('fecha')){
        localStorage.setItem('fecha', fecha);
        localStorage.setItem('var_min', var_min);
    }

</script>
   {{--
 @else
  <script>
    window.onload = function() {
        window.location.replace("../../index");
    }
  </script>
@endif
--}}

{{-- @stop

@section('css')

@stop

@section('js') --}}

<script>

const vaidar_tiempo = ()=>{
    const d = new Date();
    const _var_min = d.getMinutes();
    const var_seg = d.getSeconds();
    console.log(var_min);
    console.log(fecha);

    if(_var_min >= localStorage.getItem('var_min')){
        axios.post('/formulario/cerrar')
        .then(function (response) {
            console.log(response);
        })
        .catch(function (error) {
            console.log("error");
        });

        localStorage.removeItem('var_min');
        localStorage.removeItem('fecha');

        window.onload = function() {
            window.location.replace("../../index");
        }

    }
}



const  datetime =() =>{
    var d = new Date();

    console.log(d);
    //
    console.log(d.getHours()+'-'+d.getMinutes()+'-'+d.getSeconds());
    console.log(d.getDate()+'-'+d.getFullYear() +'-'+d.getMonth());
    console.log(d.toLocaleDateString());
    const formatoMap = {
    dd: d.getDate(),
    mm: d.getMonth() + 1,
    yy: d.getFullYear().toString().slice(-2),
    yyyy: d.getFullYear()
    };


console.log(formatoMap);
console.log(d.toUTCString());

var now = d.toLocaleTimeString('en-US');
console.log(now);

console.log(d.getHours()+':'+d.getMinutes()+':'+d.getSeconds())

var var_min = d.getMinutes()+3;


}



const variable = () =>{
    var x_incom = document.getElementById("ocultar_nav");
    x_incom.style.display = "none";
}
variable();
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>


</html>

