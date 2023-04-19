@extends('adminlte::page')

@section('title', 'Empresa')

@section('content_header')
<x-encabezado-pagina 
	icono="fa fa-bank" 
	titulo="EMPRESA" 
	subtitulo="Perfil de la Empresa" 
    modoTitulo='L'>
    {{ Breadcrumbs::render('empresas') }}
</x-encabezado-pagina>
@stop

@section('content')
<div class="row">
	<div class="col-md-3">
		<div class="box">
			<div class="box-body">
				<img src="{{ asset('images/empresa/'.$empresa->logo) }}" alt="{{ Str::slug($empresa->sigla) }}" class="img-responsive img-thumbnail center-block">
				<h4 class="text-center">{{ $empresa->nombre }}</h4>
				<p class="text-muted text-center">{{ $empresa->email }}</p>
			</div>
			<!-- /.box-body -->
			<div class="box-footer">
				<button type="button" id='upload' class="btn bg-black btn-sm btn-block"><i class="fa fa-camera"></i> SUBIR FOTO</button>
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-info-circle"></i> Detalle de la empresa</h3>
			</div>
			<div class="box-body">
				{!! Form::model($empresa, ['route' => 'empresas.store']) !!}
					@include('empresas.partials.form')
				{!! Form::close() !!}
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</div>

@include('empresas.partials.modal')

@stop

@section('css')
<!-- DropZone -->
<link rel="stylesheet" href="{{ asset('plugins/dropzone/basic.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/dropzone/dropzone.css') }}">
@stop

@section('js')
<!-- DropZone -->
<script src="{{ asset('plugins/dropzone/dropzone.js') }}"></script>
<script>
  	const botonUpload = document.getElementById('upload');
  	botonUpload.addEventListener('click',e => {
    	$('#modal-logo').modal('show');
	  });
	  
  	Dropzone.options.miDropzone = {
		paramName: "file",
		dictDefaultMessage: 'Arrastre el logo aqui para subir al sistema',
		dictRemoveFile: 'Eliminar archivo',
		addRemoveLinks: true,
		autoProcessQueue:false,
		maxFiles:1,
		acceptedFiles:'.png,.jpg,.gif,.bmp,.jpeg',
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
@stop