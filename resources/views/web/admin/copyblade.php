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
            <form>
                              

              <div class="row">
                  <div class="col-md-4">
                      <div class="form-outline mb-4">
                          <input type="text" id="form_nombres" name="" class="form-control" value="" />
                          <label class="form-label" for="">Nombre Completo</label>
                          
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-outline mb-4">
                          <input type="text" id="form_paterno" name="" class="form-control"  value="Quispe"/>
                          <label class="form-label" for="">Apellido Materno</label>
                         
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-outline mb-4">
                          <input type="text" id="form_materno" name="" class="form-control"  value="Mamani"/>
                          <label class="form-label" for="">Apellidos Materno</label>
                          <div id="" class="invalid-feedback">
                            Proporcione Materno.
                          </div>
                      </div>
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-5">
                      <div class="form-outline mb-4">
                          <input type="text" id="form_nro_documento" name="" class="form-control"  value="6649190"/>
                          <label class="form-label" for="form3Example3">Canet de Identidad</label>
                          <div id="" class="invalid-feedback">
                            Proporcione una Canet de Identidad válida.
                          </div>
                      </div>
                  </div>
                  <div class="col-md-2">
                    <div id="register_department">

                    </div>                            
                      <select class="form-select" id="form_departamento_id">
                      <option value="">Seleccione una opción</option>                          
                      </select>
                      
                   
                      <div class="invalid-feedback">
                          Expedido
                      </div>
                      
                  </div>
                  <div class="col-md-5">
                      <div class="form-outline mb-4">
                          <input type="text" id="form_nro_celular" name="" class="form-control" value="75797174" />
                          <label class="form-label" for="form3Example3">Celular</label>
                          <div id="" class="invalid-feedback">
                              Proporcione su Celular.
                          </div>
                      </div>
                  </div>
              </div>

             

              <div class="row">
                  <div class="col-md-12">
                      <div class="form-outline mb-4">
                          <input type="text" id="form_direccion" name="" class="form-control" value="Avenida Indu" />
                          <label class="form-label" for="form3Example4">Direccion</label>
                          <div id="" class="invalid-feedback">
                              Proporcione su Direccion.
                          </div>
                      </div>
                  </div>
              </div>
              


              <div class="row">
                  <div class="col-md-6">
                      <div class="form-outline mb-4">
                          <input type="text" id="form_email" name="" class="form-control" value="jesus@gmail.com"/>
                          <label class="form-label" for="form3Example3">Correo</label>
                          <div id="" class="invalid-feedback">
                              Proporcione su Correo.
                          </div>
                      </div>
                      
                  </div>
                  <div class="col-md-6">
                      <div class="form-outline mb-4">
                          <input type="text" id="form_fecha_nac" name="" class="form-control"  value="12-12-2021"/>
                          <label class="form-label" for="form3Example3">Fecha de Nacimiento</label>
                          <div id="" class="invalid-feedback">
                              Proporcione Fecha de Nacimiento.
                          </div>
                      </div>
                  </div>
              </div>

             

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
                      <button type="button" class="btn btn-primary btn-block mb-4" id="registrar_form">
                          Registrar
                      </button>
                     
                  </div>
              </div>
             
            </form>
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

<script src="../../web/js/index.js" type="module"></script>
@stop