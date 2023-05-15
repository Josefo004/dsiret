@extends('adminlte::page')

@section('title',  config('adminlte.title', 'nombre APP') . ' - Creación de Empresas' )

@section('content_header')
<x-encabezado-pagina
    icono="fa fa-users"
    titulo="Editar Empresa"
    subtitulo="Gestión de empresas SIRET"
    modoTitulo='L'>
</x-encabezado-pagina>
@stop

@section('content')
<x-encabezado2-seccion
    icono="fa fa-user-circle"
    titulo="FORMULARIO DE EDICION DE EMPRESA"
    botontexto=""
    ruta="#">
</x-encabezado2-seccion>

    {!! Form::open(['route' => 'sempresas.actualizar', 'autocomplete'=>'off']) !!}
        @csrf
		@include('sempresas.partials.formEdit')
	{!! Form::close() !!}
@stop
