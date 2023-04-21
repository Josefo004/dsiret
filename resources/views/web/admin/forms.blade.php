@extends('adminlte::page')

@section('title', 'Siret')

@section('content_header')
<x-encabezado-pagina 
	icono="fa fa-bank" 
	titulo="Formulario" 
	subtitulo="de registro" 
    modoTitulo='L'>
    {{-- {{ Breadcrumbs::render('forms/index') }} --}}
</x-encabezado-pagina>
@stop
<link rel="stylesheet" href="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/css/dist/mdb5/standard/core.min.css">
 
<link rel="stylesheet" media="all" href="../../web/css/style.css" />

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@section('content')
<div class="row">
    <div class="">

    </div>
</div>
<div class="container text-center text-lg-start ">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Formulario de Registro</h2>
        </div>
    </div>
    <div class="row align-items-center">            

      <div class="col-lg-12 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
          {!! Form::open(['route' => 'personas.create']) !!}                             

              <div class="row">
                  <div class="col-md-4">
                    <div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }}">
                        <div class="form-outline mb-4">                  
                            {{ Form::text('nombres',null,['class'=> 'form-control', 'placeholder'=>'NOMBRE COMPLETO']) }}                       
                            <label class="form-label" for="">Nombre Completo</label>
                        </div>
                        @if ($errors->has('nombres'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nombres') }}</strong>
                        </span>
                        @endif
                    </div>
                  </div>


                    <div class="col-md-4">
                        <div class="form-group{{ $errors->has('paterno') ? ' has-error' : '' }}">
                            <div class="form-outline mb-4">
                                {{ Form::text('paterno',null,['class'=> 'form-control', 'placeholder'=>'APELLIDO PATERNO']) }}
                                <label class="form-label" for="">Apellido Paternno</label>
                            </div>
                            @if ($errors->has('paterno'))
                            <span class="help-block">
                                <strong>{{ $errors->first('paterno') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('materno') ? ' has-error' : '' }}">
                      <div class="form-outline mb-4">
                        {{ Form::text('materno',null,['class'=> 'form-control', 'placeholder'=>'APELLIDO MATERNO']) }}
                          <label class="form-label" for="">Apellidos Materno</label>                          
                      </div>
                        @if ($errors->has('materno'))
                        <span class="help-block">
                            <strong>{{ $errors->first('materno') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

              <div class="row">
                  <div class="col-md-5">
                    <div class="form-group{{ $errors->has('nro_documento') ? ' has-error' : '' }}">
                      <div class="form-outline mb-4">
                        {{ Form::text('nro_documento',null,['class'=> 'form-control', 'placeholder'=>'CARNET DE IDENTIDAD']) }}
                          <label class="form-label" for="form3Example3">Canet de Identidad</label>                        
                      </div>
                      @if ($errors->has('nro_documento'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nro_documento') }}</strong>
                        </span>
                        @endif
                    </div>
                  </div>

                  <div class="col-md-2">                                              
                      <select class="form-select" id="form_departamento_id">
                        <option value="">Seleccione una opción</option>                          
                      </select>                  
                      <div class="invalid-feedback">
                          Expedido
                      </div>                      
                  </div>


                  <div class="col-md-5">
                    <div class="form-group{{ $errors->has('nro_celular') ? ' has-error' : '' }}">
                      <div class="form-outline mb-4">
                      {{ Form::text('nro_celular',null,['class'=> 'form-control', 'placeholder'=>'NUMERO DE CELULAR']) }}
                          <label class="form-label" for="form3Example3">Celular</label>                          
                      </div>
                      @if ($errors->has('nro_celular'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nro_celular') }}</strong>
                        </span>
                        @endif
                    </div>
                  </div>
              </div>

             

              <div class="row">
                  <div class="col-md-12">
                    <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                      <div class="form-outline mb-4">
                      {{ Form::text('direccion',null,['class'=> 'form-control', 'placeholder'=>'DIRECCION']) }}
                          <label class="form-label" for="form3Example4">Direccion</label>                         
                      </div>
                      @if ($errors->has('direccion'))
                        <span class="help-block">
                            <strong>{{ $errors->first('direccion') }}</strong>
                        </span>
                        @endif
                    </div>
                  </div>
              </div>
              


              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      <div class="form-outline mb-4">
                      {{ Form::text('email',null,['class'=> 'form-control', 'placeholder'=>'DIRECCION']) }}
                          <label class="form-label" for="form3Example3">Correo</label>                          
                      </div>
                      @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>  
                  </div>

                  <div class="col-md-6">
                    <div class="form-group{{ $errors->has('fecha_nac') ? ' has-error' : '' }}">
                      <div class="form-outline mb-4">
                      {{ Form::text('fecha_nac',null,['class'=> 'form-control', 'placeholder'=>'FECHA DE NACIMIENTO']) }}
                          <label class="form-label" for="form3Example3">Fecha de Nacimiento</label>                          
                      </div>
                      @if ($errors->has('fecha_nac'))
                        <span class="help-block">
                            <strong>{{ $errors->first('fecha_nac') }}</strong>
                        </span>
                        @endif
                    </div>
                  </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                    <div class="row">
                    <select class="js-example-basic-multiple" name="states[]" multiple="multiple">
                        <option value="AL">Alabama</option>
                        <option value="WY">fds</option>
                        <option value="WY">xvc</option>
                        <option value="WY">wer</option>

                        <option value="WY">Wyoming</option>
                    </select>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <select class="js-example-basic-multiple" name="states[]" multiple="multiple">
                            <option value="AL">Alabama</option>
                            <option value="WY">fds</option>
                            <option value="WY">xvc</option>
                            <option value="WY">wer</option>
                            <option value="WY">Wyoming</option>
                        </select>
                    </div>
                    
                </div>
              </div>
              
                <br><hr>
             

              <!-- Checkbox -->
              <div class="form-check d-flex justify-content-center mb-4">
                <input class="form-check-input me-2" type="checkbox" value="" id="" checked />                
              </div>
              <div class="form-check d-flex justify-content-center mb-4">
                <label class="form-check-label" for="">
                    Acepta las codiciones 
                  </label>
              </div>
              <div class="row text-center">                        
                  <small id="" class="text-danger">
                    <label class="form-check-label" id="texto_error" for="">                       
                    </label>
                  </small>
               
              </div>

             
              <div class="row">
                  <div class="col-md-4 offset-md-4">                      
                      {{ Form::submit('ENVIAR INFORMACION', ['class'=>'"btn btn-primary btn-block mb-4']) }}
                     
                  </div>
              </div>
             
              {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>




@include('web.admin.modal_confirmar')

@include('web.admin.modal_verificar')
@include('web.admin.modal_smdpdf')

@stop

@section('css')

@stop

@section('js')
<!-- DropZone -->
<script type="text/javascript" src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/js/dist/mdb5/standard/core.min.js"></script>

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> --}}

<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
@stop