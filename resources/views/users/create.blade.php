@extends('adminlte::page')

@section('title',  config('adminlte.title', 'nombre APP') . ' - Creación de usuarios' )

@section('content_header')
<x-encabezado-pagina 
    icono="fa fa-users" 
    titulo="Crear Usuario" 
    subtitulo="Gestión de usuarios del sistema" 
    modoTitulo='L'>
    {{ Breadcrumbs::render('userscreate') }}
</x-encabezado-pagina>
@stop

@section('content')
<x-encabezado-seccion 
    icono="fa fa-user-circle" 
    titulo="FORMULARIO DE CREACION"
    botontexto="" 
    ruta="#">
</x-encabezado-seccion>

    {!! Form::open(['route' => 'users.store']) !!}
		@include('users.partials.form')
	{!! Form::close() !!}
@stop