@extends('adminlte::page')

@section('title',  config('adminlte.title', 'nombre APP') . ' - Creación de Empresas' )

@section('content_header')
<x-encabezado-pagina
    icono="fa fa-users"
    titulo="Editar Formulario"
    subtitulo="Gestión de formularios SIRET"
    modoTitulo='L'>
</x-encabezado-pagina>
@stop

@section('content')
<x-encabezado2-seccion
    icono="fa fa-user-circle"
    titulo="EDITAR FORMULARIO"
    botontexto=""
    ruta="#">
</x-encabezado2-seccion>

    {!! Form::open(['route' => 'formularioUpdate', 'autocomplete'=>'off']) !!}
        @csrf
		@include('formularios.partials.formEdit')
	{!! Form::close() !!}
@stop

@section('js')
<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
@stop
