@extends('adminlte::page')

@section('title',  config('adminlte.title', 'nombre APP') . ' - Mi Perfil' )

@section('content_header')
<x-encabezado-pagina
icono="fa fa-address-card"
    titulo="Perfil"
    subtitulo="Gestiona tus datos personales y de acceso"
    modoTitulo='L'>
    {{ Breadcrumbs::render('perfil') }}
</x-encabezado-pagina>

@stop

@section('content')
<div class="row">
	<div class="col-md-4">
		<div class="box box-default">
            <div class="box-body box-profile">
                <div class="text-center">
                    @if($user->imagen!=null)
                        <img class="profile-user-img img-responsive img-circle" src="{{ asset('images/users/'.$user->imagen) }}" alt="{{ $user->name }}">
                    @else
                        <img class="profile-user-img img-responsive img-circle" src="{{ asset('images/users/user.png') }}" alt="">
                    @endif
                </div>

              	<h3 class="profile-username text-center">{{ $user->name }}</h3>

              	<p class="text-muted text-center">{{ auth()->user()->fullestado }}</p>

                @can('up-perfil')
                <div>
                    <button type="button" id='upload' class="btn bg-black btn-sm btn-block"><i class="fa fa-camera"></i></button>
                </div>
                @endcan


              	<ul class="list-group list-group-unbordered">
                	<li class="list-group-item">
                  		<b>Usuario</b> <a class="pull-right">{{ auth()->user()->username }}</a>
					</li>
					<li class="list-group-item">
						<b>Roles</b>
						<p class="pull-right">
							@foreach($roles_usuario as $role)
                                <div><span class="badge badge-pill badge-primary">{{ $role }}</span></div>
                            @endforeach

						</p>
                	</li>
              	</ul>
            </div>
            <!-- /.box-body -->
        </div>
	</div>
	<div class="col-md-8">

        <div class="row">
            <div class="col-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-user-circle"></i> INFORMACION PERSONAL</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                 <i class="fa fa-minus"></i>
                             </button>
                         </div>
                   </div>
                   {!! Form::model($user, ['route' => ['users.updateperfil', $user->id], 'method' => 'PUT']) !!}
                   <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {{ Form::label('name', 'Nombre') }}
                    {{ Form::text('name',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'NOMBRE COMPLETO','maxlength' => 200]) }}
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    </div>

                    {{-- <div class="form-group{{ $errors->has('ci') ? ' has-error' : '' }}">
                        {{ Form::label('ci', 'Carnet de Identidad') }}
                        {{ Form::text('ci', null,['class'=> 'form-control', 'placeholder'=>'Documento de Identidad', 'maxlength' => 10]) }}
                        @if ($errors->has('ci'))
                            <span class="help-block">
                                <strong>{{ $errors->first('ci') }}</strong>
                            </span>
                        @endif
                    </div> --}}

                    {{-- <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        {{ Form::label('email', 'Correo Electronico') }}
                        {{ Form::text('email', null,['class'=> 'form-control', 'placeholder'=>'CORREO ELECTRONICO', 'maxlength' => 120]) }}
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div> --}}

                    <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                        {{ Form::label('telefono', 'Telefono') }}
                        {{ Form::text('telefono', null,['class'=> 'form-control', 'placeholder'=>'NUMERO DE TELEFONO','maxlength' => 11]) }}
                        @if ($errors->has('telefono'))
                            <span class="help-block">
                                <strong>{{ $errors->first('telefono') }}</strong>
                            </span>
                        @endif
                    </div>

                    {{-- <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                        {{ Form::label('direccion', 'Domicilio') }}
                        {{ Form::text('direccion', null,['class'=> 'form-control', 'placeholder'=>'DIRECCION', 'maxlength' => 190]) }}
                        @if ($errors->has('direccion'))
                            <span class="help-block">
                                <strong>{{ $errors->first('direccion') }}</strong>
                            </span>
                        @endif
                    </div> --}}
                    @can('edit-perfil')
                    <div class="box-footer">
                        <div class="form-group text-center">
                            {{-- {{ Form::submit('ACTUALIZAR INFORMACIÓN', ['class'=>'btn btn-success']) }} --}}
                        </div>
                    </div>
                    @endcan
                   {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                         <h3 class="box-title"><i class="fa fa-lock"></i> CAMBIO DE CONTRASEÑA</h3>
                         <div class="box-tools pull-right">
                             <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                  <i class="fa fa-minus"></i>
                              </button>
                          </div>
                    </div>
                    {!! Form::model($user, ['route' => ['users.updatepassword', $user->id], 'method' => 'PUT']) !!}
                    <div class="box-body">
                        <div class="form-group">
                            {{ Form::label('password', 'Contraseña') }}
                            {{ Form::password('password',['class'=> 'form-control','placeholder'=>'*******', 'maxlength' => 20]) }}
                        </div>
                        <br>
                        <div class="form-group">
                            {{ Form::label('password-confirm', 'Repetir contraseña') }}
                            {{ Form::password('password_confirmation',['class'=> 'form-control','placeholder'=>'*******', 'maxlength' => 20]) }}
                        </div>
                    </div>
                    <!-- /.box-body -->
                    @can('edit-perfil')
                    <div class="box-footer">
                        <div class="form-group text-center">
                            {{ Form::submit('CAMBIAR CONTRASEÑA', ['class'=>'btn btn-success']) }}
                        </div>
                    </div>
                    @endcan
                    {!! Form::close() !!}
                  </div>
            </div>
        </div>

	</div>
</div>

@include('users.partials.modal')
@stop


@section('css')
@can('up-perfil')
<!-- DropZone -->
<link rel="stylesheet" href="{{ asset('plugins/dropzone/basic.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/dropzone/dropzone.css') }}">
@endcan
@stop


@section('js')
@can('up-perfil')
<!-- DropZone -->
<script src="{{ asset('plugins/dropzone/dropzone.js') }}"></script>
<script>
  	const botonUpload = document.getElementById('upload');
  	botonUpload.addEventListener('click',e => {
    	$('#modal-logo').modal('show');
	  });

  	Dropzone.options.miDropzone = {
		paramName: "file",
		dictDefaultMessage: 'Arrastre su fotografia aqui',
		dictRemoveFile: 'Eliminar foto',
		addRemoveLinks: true,
		autoProcessQueue:false,
        maxFiles:1,

        resizeWidth: 260,
        resizeHeight: 260,
        resizeQuality: 0.8,
        resizeMethod: 'crop',

		acceptedFiles:'.png,.jpg,.gif,.jpeg',
		init:function(){
			var submitButton = document.querySelector('#button-upload');
			myDropzone = this;
			submitButton.addEventListener('click', function(){
				myDropzone.processQueue();
			});

			this.on('complete', function(){
				if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
				{
					var _this = this;
					_this.removeAllFiles();
					$('#modal-logo').modal('hide');
					location.reload();
				}
			});
		}
  	};
</script>
@endcan
@stop







