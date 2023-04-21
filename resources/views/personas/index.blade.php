<x-layouts.app>

<div class="container">
    <nav class="navbar" style="background-color: #FFA500;">
        <div class="container-fluid">
            <span class="navbar-brand">SIRET</span>
        </div>
    </nav>
  @if (!session()->has('0.nro_documento') && !session()->has('0.fecha_nac'))

  <div class="container text-center text-lg-start ">
    <div class="row">
        <div class="col-md-12 text-center">
          <strong><h2>Formulario de Registro</h2></strong>
        </div>
    </div>
    <div class="col-md-12 text-right">
        <a href="javascript:history.back()" class="btn btn-info"> Volver Atrás</a>
    </div>
    <div class="row align-items-center">

      <div class="col-lg-12 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
          {!! Form::open(array('route' => 'registrarpersona', 'method'=>'POST', 'autocomplete'=>'off')) !!}
            @csrf
              <div class="row">
                  <div class="col-md-4">
                    <div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }}">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="">Nombres</label>
                            {{ Form::text('nombres',null,['class'=> 'form-control','id'=>'form_nombres', 'maxlength'=>'40','name'=>'nombres','placeholder'=>'NOMBRE COMPLETO']) }}
                        </div>
                        @if ($errors->has('nombres'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('nombres') }}</strong>
                        </span>
                        @endif
                    </div>
                  </div>


                    <div class="col-md-4">
                        <div class="form-group{{ $errors->has('paterno') ? ' has-error' : '' }}">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="">Apellido Paternno</label>
                                {{ Form::text('paterno',null,['class'=> 'form-control','id'=>'form_paterno', 'maxlength'=>'40', 'name'=>'paterno', 'placeholder'=>'APELLIDO PATERNO']) }}
                            </div>
                            @if ($errors->has('paterno'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('paterno') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group{{ $errors->has('materno') ? ' has-error' : '' }}">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="">Apellidos Materno</label>
                            {{ Form::text('materno',null,[ 'class'=> 'form-control','id'=>'form_materno', 'maxlength'=>'40', 'name'=>'materno', 'placeholder'=>'APELLIDO MATERNO']) }}
                        </div>
                            @if ($errors->has('materno'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('materno') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
            </div>

              <div class="row">
                  <div class="col-md-4">
                    <div class="form-group{{ $errors->has('nro_documento') ? ' has-error' : '' }}">
                      <div class="form-outline mb-4">
                        <label class="form-label" >Carnet de Identidad</label>
                        {{ Form::text('nro_documento',null,[ 'class'=> 'form-control','id'=>'form_nro_documento', 'maxlength'=>'40', 'name'=>'nro_documento' ,'placeholder'=>'CARNET DE IDENTIDAD']) }}
                      </div>
                      @if ($errors->has('nro_documento'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('nro_documento') }}</strong>
                        </span>
                        @endif
                    </div>
                  </div>

                  <div class="col-md-4">
                      <div class="form-group{{ $errors->has('department_id') ? ' has-error' : '' }}">
                        <label class="form-label" >Expedido</label>
                        {{ Form::select('department_id', $departments, null,[ 'class'=> 'form-control text-uppercase','id'=>'form_departamento_id','name'=>'department_id' ,'placeholder'=>'SELECCIONE EXPEDIDO', 'style'=>'width:100%;','required' => 'required']) }}
                        @if ($errors->has('department_id'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('department_id') }}</strong>
                            </span>
                        @endif
                      </div>

                  </div>


                  <div class="col-md-4">
                    <div class="form-group{{ $errors->has('nro_celular') ? ' has-error' : '' }}">
                      <div class="form-outline mb-4">
                        <label class="form-label" >Celular</label>
                        {{ Form::text('nro_celular',null,[ 'type'=>'number', 'class'=> 'form-control' , 'maxlength'=>'10', 'id'=>'form_nro_celular', 'name'=>'nro_celular', 'pattern'=>'[0-9]+' ,'placeholder'=>'NUMERO DE CELULAR']) }}
                      </div>
                      @if ($errors->has('nro_celular'))
                        <span class="text-danger">
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
                        <label class="form-label" for="form3Example4">Direccion</label>
                        {{ Form::text('direccion',null,[ 'class'=> 'form-control','id'=>'form_direccion', 'maxlength'=>'100', 'name'=>'direccion', 'placeholder'=>'DIRECCION']) }}
                      </div>
                      @if ($errors->has('direccion'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('direccion') }}</strong>
                        </span>
                        @endif
                    </div>
                  </div>
              </div>



              <div class="row">
                  <div class="col-md-4">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      <div class="form-outline mb-4">
                        <label class="form-label" >Correo</label>
                        {{ Form::text('email',null,[ 'class'=> 'form-control','id'=>'form_email', 'name'=>'email', 'placeholder'=>'CORREO']) }}
                      </div>
                      @if ($errors->has('email'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group{{ $errors->has('fecha_nac') ? ' has-error' : '' }}">
                      <div class="form-outline mb-4">
                        <label class="form-label" >Fecha de Nacimiento</label>
                        {{ Form::date('fecha_nac',null,[ 'type' => 'date', 'class'=> 'form-control','id'=>'form_fecha_nac', 'min'=>'1941-01-01', 'max'=>'2006-12-31', 'name'=>'fecha_nac', 'placeholder'=>'FECHA DE NACIMIENTO']) }}
                      </div>
                      @if ($errors->has('fecha_nac'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('fecha_nac') }}</strong>
                        </span>
                        @endif
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="row">
                      <div class="form-group{{ $errors->has('gender_id') ? ' has-error' : '' }}">
                        <label class="form-label" >Sexo</label>
                        {{ Form::select('gender_id', $genders, null,[ 'class'=> 'form-control text-uppercase','id'=>'form_gender_id', 'name'=>'gender_id' ,'placeholder'=>'SEXO', 'style'=>'width:100%;','required' => 'required']) }}
                        @if ($errors->has('gender_id'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('gender_id') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                  </div>

              </div>
                <hr>
              <div class="row">
                <div class="form-group{{ $errors->has('record_id') ? ' has-error' : '' }}">
                    {{ Form::label('record_id', 'Nivel de Educacion Alcanzada') }}
                    {{ Form::select('record_id', $records, null,[ 'class'=> 'form-control text-uppercase','id'=>'form_record_id', 'name'=>'record_id' ,'placeholder'=>'NIVEL EDUCACION ALCANZADO', 'style'=>'width:100%;','required' => 'required']) }}
                    @if ($errors->has('record_id'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('record_id') }}</strong>
                        </span>
                    @endif
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6">
                    <div class="row position-relative">
                        <div class="form-group{{ $errors->has('language_id') ? ' has-error' : '' }}">
                            {{ Form::label('language_id', 'Idioma') }}
                            {{ Form::select('language_id', $languages, null,[ 'class'=> 'js-example-basic-multiple','multiple'=>'multiple','id'=>'form_language_id','name'=>'language_id[]' , 'style'=>'width:100%;','required' => 'required']) }}
                            @if ($errors->has('language_id'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('language_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div id="validar_lenguage"></div>

                    </div>

                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="form-group{{ $errors->has('profession_id') ? ' has-error' : '' }}">
                            {{ Form::label('profession_id', 'Profesion') }}
                            {{ Form::select('profession_id', $profesions, null,[ 'class'=> 'js-example-basic-multiple','multiple'=>'multiple','id'=>'form_profession_id','name'=>'profession_id[]' , 'style'=>'width:100%;','required' => 'required']) }}
                            @if ($errors->has('profession_id'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('profession_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div id="validar_profession"></div>
                    </div>

                </div>
              </div>




                <br><hr>


              <!-- Checkbox -->
              <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <input class="form-check-input me-2"  id="form_condiciones"  type="checkbox" id="" required />
                            <label class="form-check-label " for="">
                                <a href="{{ route('formulario.info') }}">Acepte los Términos y Condiciones</a>
                            </label>
                        </div>
                    </div>
                </div>
              </div>

                <br><br>
              <div class="row">
                <div class="col-md-4 offset-md-4 text-center">
                    <button type="button" class="btn btn-warning" id="registrar_form">Registrar</button>
                </div>
              </div>


            @include('web.admin.modal_confirmar')

            @include('web.admin.modal_verificar')
            @include('web.admin.modal_smdpdf')


              {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
</div>

<footer>
<div class="row">
  <div class="col-md-12 text-right">
    <p class="">&copy;2023 Gobierno Autónomo de Chuquisaca - Todos los derechos reservados <strong>JSTI.</strong></p>
  </div>
</div>

  @else
<script>
  window.onload = function() {
      window.location.replace("/formulario/infoperson");
  }
</script>
@endif
</footer>
</div>

<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>

<script src="web/js/index_form.js" type="module"></script>
</x-layouts.app>
