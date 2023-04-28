@extends('adminlte::page')

@section('title',  config('adminlte.title', 'nombre APP') . ' - Creación de Empresas' )

@section('content_header')
<x-encabezado-pagina
    icono="fa fa-users"
    titulo="Crear Usuario"
    subtitulo="Gestión de empresas SIRET"
    modoTitulo='L'>
</x-encabezado-pagina>
@stop

@section('content')
<x-encabezado2-seccion
    icono="fa fa-user-circle"
    titulo="FORMULARIO DE CREACION DE EMPRESA"
    botontexto=""
    ruta="#">
</x-encabezado2-seccion>

    {!! Form::open(['route' => 'users.store']) !!}
		@include('sempresas.partials.form')
	{!! Form::close() !!}
@stop
